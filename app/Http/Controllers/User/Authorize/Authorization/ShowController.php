<?php

namespace App\Http\Controllers\User\Authorize\Authorization;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Authorize\Authorization\StoreRequest;

class ShowController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        /*$userRemember = $data["userRemember"] ?? null;
        unset($data["userRemember"]);*/

        if (auth("web")->attempt($data)) {
            return redirect()->route("user.user-cabinet.index");
        }

        return redirect()->route("user.authorization.index")->withErrors(
            ["error" => "Помилка не вірний email або пароль"]
        );
    }
}
