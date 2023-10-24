<?php

namespace App\Http\Controllers\User\UserCabinet\Graduation;

use App\Http\Controllers\Controller;
use App\Models\Graduation;

class IndexController extends Controller
{
    public function __invoke()
    {
        $graduations = Graduation::where("email", "=", auth()->user()->email)->get();
        return view("user.user-cabinet.graduation.index", ["graduations" => $graduations]);
    }
}
