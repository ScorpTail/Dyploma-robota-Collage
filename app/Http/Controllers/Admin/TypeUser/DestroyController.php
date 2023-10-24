<?php

namespace App\Http\Controllers\Admin\TypeUser;

use App\Http\Controllers\Controller;
use App\Models\TypeUser;

class DestroyController extends Controller
{

    public function __invoke(TypeUser $typeUser)
    {
        if ($typeUser->id == 2 || $typeUser->id == 1) {
            return redirect()->route("admin.role.index")->with("admin-alert", "Видалення заборонено!");
        }

        $typeUser->delete();
        return redirect()->route("admin.typeUser.index");
    }
}
