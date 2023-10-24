<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Message\MessageRequest;
use App\Mail\Admin\Mail\ContactGraduationMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class DestroyController extends Controller
{

    public function __invoke(Contact $contact, MessageRequest $request)
    {
        $data = $request->validated();
        Mail::to($contact->email)->send(new ContactGraduationMail($contact, $data));
        $data["is_read"] = true;
        $contact->update($data);
        $contact->delete();
        return redirect()->route("admin.contact.index");
    }
}
