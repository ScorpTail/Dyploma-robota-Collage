<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class ViewedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return $next($request);
        }

        $this->viewed($request->ip());

        $userId = $request->user()->id ?? null;
        $pageHistory = $request->session()->get("history", []);

        $data = [
            $userId => [
                'value' => Route::current()->parameters()["service"],
                'time' => Carbon::now(),
            ],
        ];

        foreach ($data as $key => $value) {
            $serializedValue = serialize($value['value']);
            $time = $value['time'];

            $existingValues = array_map(function ($item) {
                return $item['value'];
            }, $pageHistory[$key] ?? []);

            if (!in_array($serializedValue, array_map('serialize', $existingValues))) {
                $pageHistory[$key][] = [
                    'value' => unserialize($serializedValue),
                    'time' => $time,
                ];
            }
        }

        $request->session()->put('history', $pageHistory);
        $request->session()->save();
        //  dd(session()->all());
        return $next($request);
    }

    private function viewed($ip)
    {
        if (Route::current()->hasParameter('service')) {
            $service = Route::current()->parameter('service');

            $service->views()->firstOrCreate(["ip_address" => $ip], [
                "service_id" => $service->id,
                "ip_address" => $ip,
            ]);
        }
    }
}


