<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class EditController extends Controller
{

    public function __invoke(Contact $contact)
    {
        return view("admin.contact.edit", ["contact" => $contact]);
    }
}
