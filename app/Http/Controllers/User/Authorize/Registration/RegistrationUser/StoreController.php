<?php

namespace App\Http\Controllers\User\Authorize\Registration\RegistrationUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Authorize\RegistrationUser\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data["password"] = Hash::make($data["password"]);
        $data["type_user_id"] = 1;
        $user = User::create($data);

        if ($user) {
            auth("web")->login($user);
        }

        return redirect()->route("user.user-cabinet.index");
    }
}
