<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;

class EditController extends Controller
{

    public function __invoke(Service $service)
    {
        return view("admin.services.edit", ["service" => $service]);
    }
}
