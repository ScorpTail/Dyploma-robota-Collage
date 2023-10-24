<?php

namespace App\Http\Controllers\User\UserCabinet\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Services\StoreRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        if (isset($data["photo"])) {
            foreach ($data["photo"] as $userPhoto) {
                $temp[] = "/storage/" . Storage::disk("public")->put("/user_images", $userPhoto);
                $data["photo"] = $temp;
            }
            $dist = "";
            foreach ($data["photo"] as $key => $distPhoto) {
                $dist .= $distPhoto . ($key == array_key_last($data["photo"]) ? "" : "|");
            }
            $data["photo"] = $dist;
        }
        /*$data["user_id"] = auth()->user()->getAuthIdentifier();*/
        $data["user_id"] = auth()->user()->id;
        Service::create($data);
        return redirect()->route("user.user-cabinet.order.index");
    }
}
