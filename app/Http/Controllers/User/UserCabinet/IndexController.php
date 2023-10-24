<?php

namespace App\Http\Controllers\User\UserCabinet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view("user.user-cabinet.personal-information.index");
    }
}
