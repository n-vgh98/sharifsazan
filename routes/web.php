<?php

use App\Http\Controllers\Admin\AdminArticleCategoryController;
use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminBooksController;
use App\Http\Controllers\Admin\AdminContact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminInviteCategoryController;
use App\Http\Controllers\Admin\AdminInvitePagesController;
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
        route::post("/store", [AdminUserController::class, "store"])->name("admin.users.store");
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
    // route for showing all messages
    route::prefix("notifications")->group(function () {
        // route::get("/", [AdminNotificationController::class, "index"])->name("admin.notifications.index");
        route::delete("/destroy/{id}", [AdminNotificationController::class, "destroy"])->name("admin.notifications.destroy");
        route::post("/status/update/{id}", [AdminNotificationController::class, "statusupdate"])->name("admin.notifications.status.update");
        route::post("/store", [AdminNotificationController::class, "store"])->name("admin.notifications.store");

        // route for showing public messages
        route::prefix("public")->group(function () {
            route::get("/", [AdminNotificationController::class, "public"])->name("admin.notifications.public");
        });

        // route for showing private messages
        route::prefix("private")->group(function () {
            route::get("/", [AdminNotificationController::class, "private"])->name("admin.notifications.private");
        });
    });


    // route for courses
    route::prefix("courses")->group(function () {

        // route for showing all courses
        route::get("/", [AdminCourseController::class, "all"])->name("admin.courses.all");
        route::get("/create", [AdminCourseController::class, "create"])->name("admin.courses.create");
        route::post("/store", [AdminCourseController::class, "store"])->name("admin.courses.store");
        route::post("/update/{id}", [AdminCourseController::class, "update"])->name("admin.courses.update");
        route::get("/edit/{id}", [AdminCourseController::class, "edit"])->name("admin.courses.edit");
        route::delete("/delete/{id}", [AdminCourseController::class, "destroy"])->name("admin.courses.destroy");


        // route for showing free courses
        route::prefix("free")->group(function () {
            route::get("/", [AdminCourseController::class, "free"])->name("admin.courses.free");
        });

        // route for showing not_free courses
        route::prefix("notfree")->group(function () {
            route::get("/", [AdminCourseController::class, "notfree"])->name("admin.courses.not.free");
        });

        // route for showing online courses
        route::prefix("online")->group(function () {
            route::get("/", [AdminCourseController::class, "online"])->name("admin.courses.online");
        });

        // route for showing offline courses
        route::prefix("offline")->group(function () {
            route::get("/", [AdminCourseController::class, "offline"])->name("admin.courses.offline");
        });
    });

    // route for books
    route::prefix("books")->group(function () {
        route::get("/", [AdminBooksController::class, "index"])->name("admin.books.index");
        route::delete("/destroy/{id}", [AdminBooksController::class, "destroy"])->name("admin.books.destroy");
        route::post("/store", [AdminBooksController::class, "store"])->name("admin.books.store");
    });

    // route for articles
    route::prefix("articles")->group(function () {
        route::get("/", [AdminArticleController::class, "index"])->name("admin.articles.index");
        route::get("/farsi", [AdminArticleController::class, "indexfarsi"])->name("admin.articles.farsi.index");
        route::get("/english", [AdminArticleController::class, "indexenglish"])->name("admin.articles.english.index");
        route::get("/show/{id}", [AdminArticleController::class, "show"])->name("admin.articles.show");
        route::delete("/destroy/{id}", [AdminArticleController::class, "destroy"])->name("admin.articles.destroy");
        route::get("/create", [AdminArticleController::class, "create"])->name("admin.articles.create");
        route::post("/store", [AdminArticleController::class, "store"])->name("admin.articles.store");
        route::get("/edit/{id}", [AdminArticleController::class, "edit"])->name("admin.articles.edit");
        route::post("/update/{id}", [AdminArticleController::class, "update"])->name("admin.articles.update");

        // route for article categories
        route::prefix("categories")->group(function () {
            route::get("/", [AdminArticleCategoryController::class, "index"])->name("admin.articles.categories.index");
            route::delete("/destroy/{id}", [AdminArticleCategoryController::class, "destroy"])->name("admin.articles.categories.destroy");
            route::post("/store", [AdminArticleCategoryController::class, "store"])->name("admin.articles.categories.store");
            route::get("/show/{id}", [AdminArticleCategoryController::class, "show"])->name("admin.articles.categories.show");
        });
    });

    // route for invite
    route::prefix("invite_group")->group(function () {
        route::get("/", [AdminInviteCategoryController::class, "index"])->name("admin.invites.category.index");
        route::delete("/destroy/{id}", [AdminInviteCategoryController::class, "destroy"])->name("admin.invites.category.destroy");
        route::post("/store", [AdminInviteCategoryController::class, "store"])->name("admin.invites.category.store");
        route::get("/show/{id}", [AdminInviteCategoryController::class, "show"])->name("admin.invites.category.show");
        // route to show invite pages for each group
        route::prefix("pages")->group(function () {
            route::get("/", [AdminInvitePagesController::class, "index"])->name("admin.invites.pages.index");
            route::get("/edit/{id}", [AdminInvitePagesController::class, "edit"])->name("admin.invites.pages.edit");
            route::post("/update/{id}", [AdminInvitePagesController::class, "update"])->name("admin.invites.pages.update");
            route::post("/store", [AdminInvitePagesController::class, "store"])->name("admin.invites.pages.store");
            route::get("/create", [AdminInvitePagesController::class, "create"])->name("admin.invites.pages.create");
            route::delete("/destroy/{id}", [AdminInvitePagesController::class, "destroy"])->name("admin.invites.pages.destroy");
        });
    });
});
