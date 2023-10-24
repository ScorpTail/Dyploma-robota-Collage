<?php

namespace App\Http\Controllers\User\UserCabinet\Favorite;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view(
            "user.user-cabinet.favorite-list.index");
    }
}
