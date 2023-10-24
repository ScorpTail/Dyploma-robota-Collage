<?php

namespace App\Http\Controllers\Admin\TypeUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TypeUser\UpdateRequest;
use App\Models\TypeUser;

class UpdateController extends Controller
{

    public function __invoke(UpdateRequest $request, TypeUser $typeUser)
    {
        $typeUser->update($request->validated());
        return view("admin.type-user.show", ["type" => $typeUser]);
    }
}
