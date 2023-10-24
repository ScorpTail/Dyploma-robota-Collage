<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Services\UpdateRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Service $service)
    {
        $data = $request->validated();
        $hidden = explode("|", $data["hidden"]);
        if (isset($data["photo"])) {
            foreach ($data["photo"] as $userPhoto) {
                $temp[] = "/storage/" . Storage::disk("public")->put("/user_images", $userPhoto);
                $data["photo"] = $temp;
            }

            foreach ($hidden as $test) {
                $path = strstr($test, "storage");
                $data["photo"][] = $path;
            }

            $dist = "";
            foreach ($data["photo"] as $key => $distPhoto) {
                $dist .= $distPhoto . ($key == array_key_last($data["photo"]) ? "" : "|");
            }

            $data["photo"] = $dist;
        } else {
            foreach ($hidden as $strPhoto) {
                $temp = strstr($strPhoto, "storage");
                $data["photo"][] = $temp;
            }

            $dist = "";
            foreach ($data["photo"] as $key => $distPhoto) {
                $dist .= $distPhoto . ($key == array_key_last($data["photo"]) ? "" : "|");
            }

            $data["photo"] = $dist;
        }

        unset($data["hidden"]);
        /*$data["user_id"] = auth()->user()->getAuthIdentifier();*/
        $service->update($data);
        return redirect()->route("admin.services.index");
    }
}
