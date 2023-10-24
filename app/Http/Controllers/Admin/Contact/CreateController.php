<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{

    public function __invoke()
    {
        return view("admin.contact.create");
    }
}
