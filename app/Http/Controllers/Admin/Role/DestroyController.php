<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;

class DestroyController extends Controller
{

    public function __invoke(Role $role)
    {
        if ($role->id == 2 || $role->id == 1) {
            return redirect()->route("admin.role.index")->with("admin-alert", "Видалення заборонено!");
        }

        $role->delete();
        return redirect()->route("admin.role.index");
    }
}
