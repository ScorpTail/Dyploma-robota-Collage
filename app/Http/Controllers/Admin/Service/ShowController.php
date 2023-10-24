<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ShowController extends Controller
{
    public function __invoke(Service $service)
    {
        return view("admin.services.show", ["service" => $service]);
    }
}
