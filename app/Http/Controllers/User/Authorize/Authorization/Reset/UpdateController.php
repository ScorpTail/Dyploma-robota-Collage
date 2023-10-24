<?php

namespace App\Http\Controllers\User\Authorize\Authorization\Reset;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Authorize\Reset\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $token)
    {
        $data = $request->validated();
        //dd($data);
        $updatePassword = DB::table("password_reset_tokens")->where([
            "email" => $data["email"],
            "token" => $token,
        ])->first();

        if (!$updatePassword) {
            return redirect()->back()->withErrors(["email" => "Такої електронної адреси не існує"]);
        }
        $hash = Hash::make($data["password"]);
        User::where("email", $data["email"])
            ->update(["password" => $hash]);

        DB::table("password_reset_tokens")->where(["email" => $data["email"]])->delete();

        return redirect()->route("user.authorization.index")->with("alert", "Пароль було успішно відновлено");
    }
}
