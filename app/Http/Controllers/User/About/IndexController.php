<?php

namespace App\Http\Controllers\User\About;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function __invoke()
    {
        return view("user.about-page.index");
    }
}
