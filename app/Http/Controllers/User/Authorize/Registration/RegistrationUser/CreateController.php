<?php

namespace App\Http\Controllers\User\Authorize\Registration\RegistrationUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        return view("user.authorize.registration-page.registration-user.create");
    }
}
