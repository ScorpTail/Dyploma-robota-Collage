<?php

namespace App\Http\Controllers\Admin\Graduation;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{

    public function __invoke()
    {
        return view("admin.graduation.create");
    }
}
