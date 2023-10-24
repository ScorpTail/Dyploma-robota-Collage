<?php

namespace App\Http\Controllers\User\Services\UserAccount;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ShowController extends Controller
{
    public function __invoke(Service $service)
    {
        return view("user.services.user-account-page.user-services.index", ["service" => $service]);
    }
}
