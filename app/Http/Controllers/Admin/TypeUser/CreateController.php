<?php

namespace App\Http\Controllers\Admin\TypeUser;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{

    public function __invoke()
    {
        return view("admin.type-user.create");
    }
}
