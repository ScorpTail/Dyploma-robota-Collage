<?php

namespace App\Http\Controllers\User\UserCabinet\UserInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        return view("user.user-cabinet.personal-information.index");
    }
}
