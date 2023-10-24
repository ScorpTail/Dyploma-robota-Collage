<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;

class DestroyController extends Controller
{
    public function __invoke(Service $service)
    {
        $service->reports()->delete();
        $service->delete();
        return redirect()->route("admin.services.index");
    }
}
