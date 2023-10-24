<?php

namespace App\Http\Controllers\User\UserCabinet\UserInfo\Password;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view("user.user-cabinet.personal-information.password.index");
    }
}
