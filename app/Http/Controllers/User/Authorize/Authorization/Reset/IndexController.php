<?php

namespace App\Http\Controllers\User\Authorize\Authorization\Reset;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view("user.authorize.reset-page.index");
    }
}
