<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Graduation;
use App\Models\Report;
use App\Models\Service;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view(
            "admin.main.index",
            [
                "users" => User::all(),
                "graduations" => Graduation::all()->where("is_read", false),
                "services" => Service::all(),
                "messages" => Contact::all()->where("is_read", false),
                "reports" => Report::where("is_read", false),
            ]
        );
    }
}
