<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contact\UpdateRequest;
use App\Models\Contact;

class UpdateController extends Controller
{

    public function __invoke(Contact $contact)
    {
        return view("admin.contact.show", ["contact" => $contact]);
    }
}
