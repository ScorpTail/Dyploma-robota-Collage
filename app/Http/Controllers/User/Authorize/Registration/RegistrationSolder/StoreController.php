<?php

namespace App\Http\Controllers\User\Authorize\Registration\RegistrationSolder;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Authorize\RegistrationSolder\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data["password"] = Hash::make($data["password"]);
        if (isset($data["avatar"])) {
            $data["avatar"] = "/storage/" . Storage::disk("public")->put("/user_images", $data["avatar"]);
        } else {
            $data["avatar"] = "storage/image/default_avatar.svg";
        }

        $temp = [
            "profession" => $data["profession"],
            "area" => $data["area"],
            "avatar" => $data["avatar"],
            "resume" => $data["resume"]
        ];
        unset($data["profession"], $data["area"], $data["avatar"], $data["resume"]);
        $data["type_user_id"] = 2;
        $user = User::create($data);
        $user->solder()->create($temp);

        if ($user) {
            auth("web")->login($user);
        }

        return redirect()->route("user.user-cabinet.index");
    }
}
