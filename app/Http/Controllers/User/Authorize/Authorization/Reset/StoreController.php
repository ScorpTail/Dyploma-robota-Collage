<?php

namespace App\Http\Controllers\User\Authorize\Authorization\Reset;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Authorize\Reset\StoreRequest;
use App\Mail\User\Reset;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $token = \Illuminate\Support\Str::random(64);
        DB::table("password_reset_tokens")->insert([
            "email" => $request->email,
            "token" => $token,
            "created_at" => Carbon::now(),
        ]);
        $array = $request->validated();
        $array["token"] = $token;
        Mail::to($request->email)->send(new Reset($array));

        return redirect()->route("user.authorization.index")->with(["alert" => "Запит було надіслано"]);
    }
}
