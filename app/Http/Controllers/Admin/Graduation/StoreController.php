<?php

namespace App\Http\Controllers\Admin\Graduation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Graduation\GraduationRequest;
use App\Mail\Admin\Mail\ContactGraduationMail;
use App\Models\Graduation;
use Illuminate\Support\Facades\Mail;

class StoreController extends Controller
{

    public function __invoke(Graduation $graduation, GraduationRequest $request)
    {
        $data = $request->validated();
        Mail::to($graduation->email)->send(new ContactGraduationMail($graduation, $data));
        $data["is_read"] = true;
        $graduation->update($data);
        return redirect()->route("admin.graduation.index");
    }
}
