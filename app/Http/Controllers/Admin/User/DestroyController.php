<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DestroyController extends Controller
{

    public function __invoke(User $user)
    {
        if ($user->role_id == 2) {
            return redirect()->route("admin.user.index")->with("admin-alert", "Видалення адміністратора заборонено!");
        }
        try {
            DB::beginTransaction();
            $user->service()->delete();
            $user->services()->detach();
            $user->report()->delete();
            $user->solder()->delete();
            $user->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return redirect()->route("admin.user.index");
    }
}
