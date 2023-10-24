<?php

namespace App\Http\Controllers\Admin\TypeUser;

use App\Http\Controllers\Controller;
use App\Models\TypeUser;

class EditController extends Controller
{

    public function __invoke(TypeUser $typeUser)
    {
        return view("admin.type-user.edit", ["type" => $typeUser]);
    }
}
