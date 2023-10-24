<?php

namespace App\Http\Controllers\Admin\Graduation;

use App\Http\Controllers\Controller;
use App\Models\Graduation;

class ShowController extends Controller
{

    public function __invoke(Graduation $graduation)
    {
        return view("admin.graduation.show", [
            "graduation" => $graduation,
        ]);
    }
}
