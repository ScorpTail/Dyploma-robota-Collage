<?php

namespace App\Http\Controllers\User\UserCabinet\Message;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class IndexController extends Controller
{
    public function __invoke()
    {
        $messages = Contact::where("email", "=", auth()->user()->email)->get();
        return view("user.user-cabinet.message.index", ["messages" => $messages]);
    }
}
