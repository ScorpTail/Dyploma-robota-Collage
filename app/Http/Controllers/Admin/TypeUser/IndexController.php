<?php

namespace App\Http\Controllers\Admin\TypeUser;

use App\Http\Controllers\Controller;
use App\Models\TypeUser;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view("admin.type-user.index", ["types" => TypeUser::orderBy("id")->paginate(7)]);
    }
}
