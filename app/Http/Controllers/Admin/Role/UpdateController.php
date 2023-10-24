<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\UpdateRequest;
use App\Models\Role;

class UpdateController extends Controller
{

    public function __invoke(UpdateRequest $request, Role $role)
    {
        $role->update($request->validated());
        return view("admin.role.show", ["role" => $role]);
    }
}
