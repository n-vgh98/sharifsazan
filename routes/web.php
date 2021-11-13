<?php

use App\Http\Controllers\Admin\AdminContact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminNotificationController;
use App\Http\Controllers\Admin\AdminUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

route::prefix("admin")->middleware(["auth", "admin"])->group(function () {
    route::get("/", [AdminController::class, "index"])->name("admin.home");

    // admin can do users operation throw this routes##
    route::prefix("users")->group(function () {
        route::get("/", [AdminUserController::class, "index"])->name("admin.users");
        // dadane dastresi admin
        route::post("/promotetoadmin/{id}", [AdminUserController::class, "promotetoadmin"])->name("admin.promote");

        // hazfe dastresi admin
        route::post("/demoteadmin/{id}", [AdminUserController::class, "demoteadmin"])->name("admin.demote");

        // hazfe dastresi writer
        route::post("/demotewriter/{id}", [AdminUserController::class, "demotewriter"])->name("writer.demote");

        // dadane dastresi writer
        route::post("/promotetowriter/{id}", [AdminUserController::class, "promotetowriter"])->name("writer.promote");

        // hazfe tamame dastresi ha
        route::post("/clearroles/{id}", [AdminUserController::class, "clearroles"])->name("admin.user.clear.roles");


        route::delete("/destroy/{id}", [AdminUserController::class, "destroy"])->name("admin.users.destroy");
        route::prefix("normal")->group(function () {
            route::get("/", [AdminUserController::class, "normal"])->name("admin.normal.users");
        });
        route::prefix("writer")->group(function () {
            route::get("/", [AdminUserController::class, "writer"])->name("admin.writer.users");
        });
        route::prefix("admin")->group(function () {
            route::get("/", [AdminUserController::class, "admin"])->name("admin.admin.users");
        });
    });
    // ##


    // contact us routes
    route::prefix("contact")->group(function () {
        route::get("/", [AdminContact::class, "index"])->name("admin.contact.index");
        route::get("/download/{id}", [AdminContact::class, "download"])->name("admin.contact.download.file");
    });

    // notifications  routes
    route::prefix("contact")->group(function () {
        route::get("/", [AdminNotificationController::class, "index"])->name("admin.contact.index");
    });
});
