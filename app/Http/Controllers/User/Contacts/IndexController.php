<?php

namespace App\Http\Controllers\User\Contacts;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view("user.contacts-page.index");
    }
}
