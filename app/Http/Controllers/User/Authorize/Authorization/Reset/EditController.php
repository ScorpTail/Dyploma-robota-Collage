<?php

namespace App\Http\Controllers\User\Authorize\Authorization\Reset;

use App\Http\Controllers\Controller;

class EditController extends Controller
{

    public function __invoke($token)
    {
        return view("user.authorize.reset-page.edit", ["token" => $token]);
    }
}
