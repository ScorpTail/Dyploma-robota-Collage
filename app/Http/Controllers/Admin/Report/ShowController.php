<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\Report;

class ShowController extends Controller
{

    public function __invoke(Report $report)
    {
        return view("admin.report.show", ["report" => $report]);
    }
}
