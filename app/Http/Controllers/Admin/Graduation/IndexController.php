<?php

namespace App\Http\Controllers\Admin\Graduation;

use App\Http\Controllers\Controller;
use App\Models\Graduation;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view(
            "admin.graduation.index",
            ["graduations" => Graduation::withTrashed()->where("is_read", false)->orderBy("id")->paginate(7)]
        );
    }
}
