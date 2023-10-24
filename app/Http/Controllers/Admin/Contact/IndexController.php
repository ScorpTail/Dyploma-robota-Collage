<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view(
            "admin.contact.index",
            ["contacts" => Contact::withTrashed()->where("is_read", false)->orderBy("id")->paginate(7)]
        );
    }
}
