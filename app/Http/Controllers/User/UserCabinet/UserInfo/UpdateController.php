<?php

namespace App\Http\Controllers\User\UserCabinet\UserInfo;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCabinet\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{

    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        if (isset($data["avatar"])) {
            $data["avatar"] = "/storage/" . Storage::disk("public")->put("/user_images", $data["avatar"]);
        } else {
            $data["avatar"] = $user->solder->avatar ?? null;
        }
        if (auth()->user()->type_user_id == 2) {
            $temp = [
                "profession" => $data["profession"],
                "area" => $data["area"],
                "avatar" => $data["avatar"],
                "resume" => $data["resume"]
            ];
            unset($data["profession"], $data["area"], $data["avatar"], $data["resume"]);
            $user->solder()->updateOrCreate(["user_id" => $user->id], $temp);
        }

        $user->update($data);

        return redirect()->route("user.user-cabinet.info.index");
    }
}
