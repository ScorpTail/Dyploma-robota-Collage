<?php

namespace App\Http\Controllers\User\UserCabinet\Order;

use App\Http\Controllers\Controller;
use App\Models\Service;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view(
            "user.user-cabinet.my-orders.index",
            ["services" => Service::where("user_id", auth()->user()->id)->paginate(2)]
        );
    }
}
