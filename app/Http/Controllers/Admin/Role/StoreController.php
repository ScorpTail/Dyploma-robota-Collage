<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\StoreRequest;
use App\Models\Role;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->all();
        Role::firstOrCreate(["name_role" => $data["name_role"]], $data);
        return redirect()->route("admin.role.index");
    }
}
