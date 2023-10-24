<?php

namespace App\Http\Controllers\User\Services\ServicesItem;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ShowController extends Controller
{
    public function __invoke(Service $service)
    {
        return view("user.services.services-item-page.index", ["service" => $service]);
    }
}
