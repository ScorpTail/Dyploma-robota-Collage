<?php

namespace App\Http\Controllers\Admin\TypeUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TypeUser\StoreRequest;
use App\Models\TypeUser;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        TypeUser::firstOrCreate(["type_name" => $data["type_name"]], $data);
        return redirect()->route("admin.typeUser.index");
    }
}
