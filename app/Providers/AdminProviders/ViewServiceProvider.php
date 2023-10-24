<?php

namespace App\Providers\AdminProviders;

use App\Models\Contact;
use App\Models\Graduation;
use App\Models\Report;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer("admin.includes.sidebar", function ($view) {
            $view->with([
                "users" => User::all()->count(),
                "graduations" => Graduation::all()->where("is_read", false)->count(),
                "services" => Service::all()->count(),
                "messages" => Contact::all()->where("is_read", false)->count(),
                "reports" => Report::where("is_read", false)
                    ->join('users', 'reports.user_id', '=', 'users.id')
                    ->whereNull('users.deleted_at')
                    ->orderBy("reports.id")->count(),
            ]);
        });

        View::composer("user.user-cabinet.index", function ($view) {
            $view->with([
                "type_user_id" => \App\Models\TypeUser::where("id", 2)->get()->modelKeys()[0],
            ]);
        });
    }
}
