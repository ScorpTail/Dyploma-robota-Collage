<?php

namespace App\Http\Controllers\User\UserCabinet\UserInfo\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCabinet\Password\UpdateRequest;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $request->validated();
        if (Hash::check($request->password, $request->user()->password)) {
            return back()->withErrors(["password" => "Введений пароль збігається із поточним паролем"]);
        }
        $request->user()->update(["password" => Hash::make($request->password)]);
        $session = app("session");
        $session->forget("auth.password_confirmed_at");
        return redirect()->route("user.user-cabinet.index")->with(["alert" => "Пароль успішно змінено"]);
    }
}
