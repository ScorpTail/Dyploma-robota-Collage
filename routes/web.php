<?php

use App\Http\Controllers\User\UserCabinet\UserInfo\Password\PasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(["namespace" => "App\Http\Controllers\User"], function () {
    Route::group(["namespace" => "Main"], function () {
        Route::get("/", IndexController::class)->name("user.main.index");
    });

    Route::group(["namespace" => "About"], function () {
        Route::get("/about", IndexController::class)->name("user.about.index");
    });

    Route::group(["namespace" => "Contacts"], function () {
        Route::get("/contacts", IndexController::class)->name("user.contacts.index");
        Route::post("/contacts", StoreController::class)->name("user.contacts.store");
    });

    Route::group(["namespace" => "Graduation"], function () {
        Route::get("/graduation", IndexController::class)->name("user.graduation.index");
        Route::post("/graduation", StoreController::class)->name("user.graduation.store");
    });

    Route::group(["namespace" => "Guarantee"], function () {
        Route::get("/guarantee", IndexController::class)->name("user.guarantee.index");
    });

    Route::group(["namespace" => "Policy"], function () {
        Route::get("/policy", IndexController::class)->name("user.policy.index");
    });

    Route::group(["namespace" => "Services"], function () {
        Route::group(["namespace" => "Services", "prefix" => "services"], function () {
            Route::get("/", IndexController::class)->name("user.services.services.index");
        });

        Route::group(["namespace" => "ServicesItem", "prefix" => "services-item"],
            function () {
                Route::get("/{service}", ShowController::class)->name("user.services.services-item.show")->middleware(
                    ["view"]
                );

                Route::group(["namespace" => "Report"], function () {
                    Route::post("/{service}", StoreController::class)->name("user.services.services-item.report.store");
                });
            });

        Route::group(["namespace" => "UserAccount", "prefix" => "user-account"], function () {
            Route::get("/{service}", ShowController::class)->name("user.services.user-account.show");

            Route::group(["namespace" => "Info", "prefix" => "info"], function () {
                Route::get("/{service}", ShowController::class)->name("user.services.user-info.show");
            });
        });
    });
});

Route::group(["namespace" => "App\Http\Controllers\User", "middleware" => "guest"], function () {
    Route::group(["namespace" => "Authorize"], function () {
        Route::group(["namespace" => "Authorization", "prefix" => "login"],
            function () {
                Route::get("/", IndexController::class)->name("user.authorization.index");
                Route::post("/", ShowController::class)->name("user.authorization.show");

                Route::group(["namespace" => "Reset", "prefix" => "reset"], function () {
                    Route::get("/", IndexController::class)->name("user.authorization.reset.index");
                    Route::post("/", StoreController::class)->name("user.authorization.reset.store");
                    Route::get("/{token}", EditController::class)->name("user.authorization.reset.edit");
                    Route::post("/{token}", UpdateController::class)->name("user.authorization.reset.update");
                });
            });

        Route::group(["namespace" => "Registration", "prefix" => "registration"], function () {
            Route::group(["namespace" => "RegistrationUser"], function () {
                Route::get("/", CreateController::class)->name("user.registration-user.create");
                Route::post("/", StoreController::class)->name("user.registration-user.store");
            });

            Route::group(["namespace" => "RegistrationSolder", "prefix" => "solder"], function () {
                Route::get("/", CreateController::class)->name("user.registration-solder.create");
                Route::post("/", StoreController::class)->name("user.registration-solder.store");
            });
        });
    });
});

Route::group(["namespace" => "App\Http\Controllers\User", "middleware" => "auth"], function () {
    Route::post("/logout", function () {
        auth("web")->logout();
        return redirect()->route("user.main.index");
    })->name("user.logout.index");

    Route::group(["namespace" => "UserCabinet", "prefix" => "account"], function () {
        Route::get("/", IndexController::class)->name("user.user-cabinet.index");
        Route::get("/{user-cabinet}", ShowController::class)->name("user.user-cabinet.show");

        Route::group(["namespace" => "Favorite", "prefix" => "favorite"], function () {
            Route::get("/", IndexController::class)->name("user.user-cabinet.favorite.index");
            Route::delete("/{service}", DestroyController::class)->name("user.user-cabinet.favorite.destroy");
        });

        Route::group(["namespace" => "Order", "prefix" => "order"], function () {
            Route::get("/", IndexController::class)->name("user.user-cabinet.order.index");
            Route::get("/create", CreateController::class)->name("user.user-cabinet.order.create");
            Route::post("/create", StoreController::class)->name("user.user-cabinet.order.store");
            Route::get("/{service}/edit", EditController::class)->name("user.user-cabinet.order.edit");
            Route::patch("/{service}/edit", UpdateController::class)->name("user.user-cabinet.order.update");
            Route::delete("/{service}", DestroyController::class)->name("user.user-cabinet.order.destroy");
        });

        Route::group(["namespace" => "Graduation", "prefix" => "graduations"], function () {
            Route::get("/", IndexController::class)->name("user.user-cabinet.graduations.index");
        });

        Route::group(["namespace" => "Message", "prefix" => "message"], function () {
            Route::get("/", IndexController::class)->name("user.user-cabinet.message.index");
        });

        Route::group(["namespace" => "UserInfo", "prefix" => "information"], function () {
            Route::get("/", IndexController::class)->name("user.user-cabinet.info.index");
            Route::post("/{user}", UpdateController::class)->name("user.user-cabinet.info.update");
        });

        Route::group(["namespace" => "UserInfo\Password", "middleware" => "password.confirm"],
            function () {
                Route::get("/change", IndexController::class)->name("user.user-cabinet.info.psw.index");
                Route::post("/change", UpdateController::class)->name("user.user-cabinet.info.psw.update");
            });

        Route::group(["namespace" => "Report", "prefix" => "report"], function () {
            Route::get("/", IndexController::class)->name("user.user-cabinet.report.index");
        });

        Route::group(["namespace" => "Viewed", "prefix" => "viewed"], function () {
            Route::get("/", IndexController::class)->name("user.user-cabinet.viewed.index");
        });
    });
});

Route::group(["namespace" => "App\Http\Controllers\Admin", "prefix" => "admin", "middleware" => ["auth", "admin"]],
    function () {
        Route::group(["namespace" => "Main"], function () {
            Route::get("/", IndexController::class)->name("admin.main.index");
        });

        Route::group(["namespace" => "User", "prefix" => "users"], function () {
            Route::get("/", IndexController::class)->name("admin.user.index");
            Route::get("/create", CreateController::class)->name("admin.user.create");
            Route::post("/create", StoreController::class)->name("admin.user.store");
            Route::get("/{user}", ShowController::class)->name("admin.user.show");
            Route::get("/{user}/edit", EditController::class)->name("admin.user.edit");
            Route::patch("/{user}/edit", UpdateController::class)->name("admin.user.update");
            Route::delete("/{user}", DestroyController::class)->name("admin.user.destroy");
        });

        Route::group(["namespace" => "Role", "prefix" => "role"], function () {
            Route::get("/", IndexController::class)->name("admin.role.index");
            Route::get("/create", CreateController::class)->name("admin.role.create");
            Route::post("/create", StoreController::class)->name("admin.role.store");
            Route::get("/{role}", ShowController::class)->name("admin.role.show");
            Route::get("/{role}/edit", EditController::class)->name("admin.role.edit");
            Route::patch("/{role}/edit", UpdateController::class)->name("admin.role.update");
            Route::delete("/{role}", DestroyController::class)->name("admin.role.destroy");
        });

        Route::group(["namespace" => "TypeUser", "prefix" => "type-user"], function () {
            Route::get("/", IndexController::class)->name("admin.typeUser.index");
            Route::get("/create", CreateController::class)->name("admin.typeUser.create");
            Route::post("/create", StoreController::class)->name("admin.typeUser.store");
            Route::get("/{typeUser}", ShowController::class)->name("admin.typeUser.show");
            Route::get("/{typeUser}/edit", EditController::class)->name("admin.typeUser.edit");
            Route::patch("/{typeUser}/edit", UpdateController::class)->name("admin.typeUser.update");
            Route::delete("/{typeUser}", DestroyController::class)->name("admin.typeUser.destroy");
        });

        Route::group(["namespace" => "Service", "prefix" => "services"], function () {
            Route::get("/", IndexController::class)->name("admin.services.index");
            Route::get("/create", CreateController::class)->name("admin.services.create");
            Route::post("/create", StoreController::class)->name("admin.services.store");
            Route::get("/{service}", ShowController::class)->name("admin.services.show");
            Route::get("/{service}/edit", EditController::class)->name("admin.services.edit");
            Route::patch("/{service}/edit", UpdateController::class)->name("admin.services.update");
            Route::delete("/{service}", DestroyController::class)->name("admin.services.destroy");
        });

        Route::group(["namespace" => "Graduation", "prefix" => "graduation"], function () {
            Route::get("/", IndexController::class)->name("admin.graduation.index");
            Route::get("/create", CreateController::class)->name("admin.graduation.create");
            Route::post("/{graduation}", StoreController::class)->name("admin.graduation.store");
            Route::get("/{graduation}", ShowController::class)->name("admin.graduation.show");
            Route::get("/{graduation}/edit", EditController::class)->name("admin.graduation.edit");
            Route::patch("/{graduation}/edit", UpdateController::class)->name("admin.graduation.update");
            Route::delete("/{graduation}", DestroyController::class)->name("admin.graduation.destroy");
        });

        Route::group(["namespace" => "Contact", "prefix" => "contact"], function () {
            Route::get("/", IndexController::class)->name("admin.contact.index");
            Route::get("/create", CreateController::class)->name("admin.contact.create");
            Route::post("/{contact}", StoreController::class)->name("admin.contact.store");
            Route::get("/{contact}", ShowController::class)->name("admin.contact.show");
            Route::get("/{contact}/edit", EditController::class)->name("admin.contact.edit");
            Route::patch("/{contact}/edit", UpdateController::class)->name("admin.contact.update");
            Route::delete("/{contact}", DestroyController::class)->name("admin.contact.destroy");
        });

        Route::group(["namespace" => "Report", "prefix" => "reports"], function () {
            Route::get("/", IndexController::class)->name("admin.report.index");
            Route::get("/{report}", ShowController::class)->name("admin.report.show");
            Route::delete("/{report}", DestroyController::class)->name("admin.report.destroy");
            Route::post("/{report}", MailController::class)->name("admin.report.mail");
        });
    });

Route::fallback(fn() => abort(404));

Route::get("/confirm", [PasswordController::class, "index"])->name("password.confirm");
Route::post("/confirm", [PasswordController::class, "store"]);
