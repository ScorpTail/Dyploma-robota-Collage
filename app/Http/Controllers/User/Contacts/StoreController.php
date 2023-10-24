<?php

namespace App\Http\Controllers\User\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Contacts\StoreRequest;
use App\Models\Contact;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        Contact::create($data);

        session(["alert" => __("Ваше повідомлення було надіслано!")]);
        return redirect()->route("user.contacts.index");
    }
}
