<?php

namespace App\Http\Controllers\Admin\Graduation;

use App\Http\Controllers\Controller;
use App\Models\Graduation;

class EditController extends Controller
{

    public function __invoke(Graduation $graduation)
    {
        return view("admin.graduation.edit", ["graduation" => $graduation]);
    }
}
