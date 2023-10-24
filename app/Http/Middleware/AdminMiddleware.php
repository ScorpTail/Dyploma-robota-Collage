<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!empty(auth()->user()->role->id) && auth()->user()->role->id != Role::where("id", "2")->get(
                "id"
            )->modelKeys()[0]) {
            abort(404);
        }
        return $next($request);
    }
}
