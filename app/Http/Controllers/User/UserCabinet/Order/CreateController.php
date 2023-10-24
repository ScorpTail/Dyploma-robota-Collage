<?php

namespace App\Http\Controllers\User\UserCabinet\Order;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view("user.user-cabinet.my-orders.create");
    }
}
