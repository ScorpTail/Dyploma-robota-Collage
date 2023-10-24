<?php

namespace App\Http\Controllers\User\UserCabinet\UserInfo\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function index()
    {
        return view("user.user-cabinet.personal-information.password.psw-confirm");
    }

    public function store(Request $request)
    {
        if (!Hash::check($request->password, $request->user()->password)) {
            return back()->withErrors([
                "password" => "Не правильний пароль!",
            ]);
        }
        $request->session()->passwordConfirmed();
        return redirect()->intended();
    }
}
