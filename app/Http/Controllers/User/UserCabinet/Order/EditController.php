<?php

namespace App\Http\Controllers\User\UserCabinet\Order;

use App\Http\Controllers\Controller;
use App\Models\Service;

class EditController extends Controller
{
    public function __invoke(Service $service)
    {
        return view("user.user-cabinet.my-orders.edit", ["service" => $service]);
    }
}
