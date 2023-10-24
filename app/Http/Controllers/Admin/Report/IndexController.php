<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view("admin.report.index");
    }
}
