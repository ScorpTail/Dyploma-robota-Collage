<?php

namespace App\Http\Controllers\User\Services\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Services\FilterRequest;
use App\Models\Service;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        //$data = $request->validated();
        $services = $this->searchAndFilter($request);
        $services->appends(['sort' => $request->input('sort')]);

        return view(
            "user.services.services-page.index",
            [
                "services" => $services,

            ]
        );
    }

    private function searchAndFilter(FilterRequest $request)
    {
        $search = $request->input("hints");
        $max = $request->input("max");
        $min = $request->input("min");
        $sort = $request->input("sort");
        $status = $request->input("status");
        $delivery = $request->input("delivery");
        $typeWork = $request->input("type_work");

        $serviceQuery = Service::query();

        if ($search) {
            $serviceQuery->where(function ($query) use ($search) {
                $query->where('title', 'ilike', '%' . $search . '%')
                    ->orWhereIn('user_id', function ($subquery) use ($search) {
                        $subquery->select('id')->from('users')->where("name", "ilike", "%" . $search . "%");
                    });
            });
        }

        if ($delivery) {
            $serviceQuery->where("is_delivery", $delivery);
        }

        if ($status) {
            $serviceQuery->where("status", $status);
        }

        if ($typeWork) {
            $serviceQuery->where("type_work", $typeWork);
        }

        if ($sort) {
            if ($sort === 'desc') {
                $serviceQuery->orderByDesc('price');
            } else {
                $serviceQuery->orderBy('price');
            }
        }

        if ($max !== null && $min !== null) {
            $serviceQuery->whereBetween('price', [intval($min), intval($max)]);
        }

        return $serviceQuery->orderByRaw("CASE WHEN status = '2' THEN 0 ELSE 1 END, status")
            ->paginate(2)->withQueryString();
    }

}



