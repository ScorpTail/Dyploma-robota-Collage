<?php

namespace App\Http\Controllers\User\Graduation;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Graduation\StoreRequest;
use App\Models\Graduation;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        if (isset($data["photo"])) {
            foreach ($data["photo"] as $userPhoto) {
                $temp[] = "storage/" . Storage::disk("public")->put("/user_images", $userPhoto);
                $data["photo"] = $temp;
            }
            $dist = "";
            foreach ($data["photo"] as $key => $distPhoto) {
                $dist .= $distPhoto . ($key == array_key_last($data["photo"]) ? "" : "|");
            }

            $data["photo"] = $dist;
        }

        Graduation::create($data);
        session(["alert" => __("Ваше повідомлення було надіслано!")]);
        return redirect()->route("user.main.index");
    }
}
