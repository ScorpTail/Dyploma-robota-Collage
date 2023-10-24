<?php

namespace App\Http\Controllers\Admin\TypeUser;

use App\Http\Controllers\Controller;
use App\Models\TypeUser;

class ShowController extends Controller
{

    public function __invoke(TypeUser $typeUser)
    {
        return view("admin.type-user.show", [
            "type" => $typeUser,
        ]);
    }
}
