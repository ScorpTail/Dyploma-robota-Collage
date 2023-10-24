<?php

namespace App\Http\Controllers\User\UserCabinet\Favorite;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class DestroyController extends Controller
{
    public function __invoke(Service $service)
    {

        return back();
    }
}
