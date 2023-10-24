<?php

namespace App\Http\Controllers\User\Services\ServicesItem\Report;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Report\StoreRequest;
use App\Models\Report;
use App\Models\Service;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request, Service $service)
    {
        $data = $request->validated();

        if (!in_array($data["type"], array("1", "2", "3"))) {
            return redirect()->route("user.services.services-item.show", $service)->withErrors(
                ["type" => "Оберіть один із пунктів!"]
            );
        }

        if (auth()->check()) {
            $data["user_id"] = auth()->user()->id;
        }

        $data["service_id"] = $service->id;
        Report::create($data);
        session(["alert" => __("Вашу скаргу було надіслано!")]);
        return redirect()->route("user.services.services-item.show", $service);
    }
}
