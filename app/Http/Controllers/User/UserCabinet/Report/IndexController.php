<?php

namespace App\Http\Controllers\User\UserCabinet\Report;

use App\Http\Controllers\Controller;
use App\Models\Report;

class IndexController extends Controller
{

    public function __invoke()
    {
        return view(
            "user.user-cabinet.report.index",
            ["reports" => Report::where("user_id", auth()->user()->id)->paginate(2)]
        );
    }
}
