<?php

use App\Http\Controllers\Admin\AdminArticleCategoryController;
use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminBooksController;
use App\Http\Controllers\Admin\AdminContact;
use App\Http\Controllers\Admin\AdminFooter;
use App\Http\Controllers\Admin\AdminOurTeamController;
use App\Http\Controllers\Admin\AdminTeamMemberController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminInviteCategoryController;
use App\Http\Controllers\Admin\AdminInvitePagesController;
use App\Http\Controllers\Admin\AdminNotificationController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Writer\WriterArticleCategoryController;
use App\Http\Controllers\Writer\WriterArticleController;
use App\Http\Controllers\Writer\WriterBooksController;
use App\Http\Controllers\Writer\WriterController;
use App\Http\Controllers\Writer\WriterCourseController;
use App\Http\Controllers\Writer\WriterInviteCategoryController;
use App\Http\Controllers\Writer\WriterInvitePagesController;

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
    return view('user.index');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/recovery', [App\Http\Controllers\Admin\AdminBooksController::class, 'check'])->name('home.check');


// admin routing
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
    //Updated upstream

    // route for courses
    route::prefix("courses")->group(function () {

        // route for showing all courses
        route::get("/", [AdminCourseController::class, "all"])->name("admin.courses.all");
        route::get("/create", [AdminCourseController::class, "create"])->name("admin.courses.create");
        route::post("/store", [AdminCourseController::class, "store"])->name("admin.courses.store");
        route::post("/update/{id}", [AdminCourseController::class, "update"])->name("admin.courses.update");
        route::get("/edit/{id}/{lang}", [AdminCourseController::class, "edit"])->name("admin.courses.edit");
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
        route::post("/update/{id}", [AdminBooksController::class, "update"])->name("admin.books.update");
    });

    // route for articles
    route::prefix("articles")->group(function () {
        route::get("/farsi", [AdminArticleController::class, "indexfarsi"])->name("admin.articles.farsi.index");
        route::get("/english", [AdminArticleController::class, "indexenglish"])->name("admin.articles.english.index");
        route::get("/show/{id}/", [AdminArticleController::class, "show"])->name("admin.articles.show");
        route::delete("/destroy/{id}", [AdminArticleController::class, "destroy"])->name("admin.articles.destroy");
        route::get("/create/{lang}", [AdminArticleController::class, "create"])->name("admin.articles.create");
        route::post("/store", [AdminArticleController::class, "store"])->name("admin.articles.store");
        route::get("/edit/{id}/{lang}", [AdminArticleController::class, "edit"])->name("admin.articles.edit");
        route::post("/update/{id}", [AdminArticleController::class, "update"])->name("admin.articles.update");

        // route for article categories
        route::prefix("categories")->group(function () {
            route::get("/", [AdminArticleCategoryController::class, "index"])->name("admin.articles.categories.index");
            route::delete("/destroy/{id}", [AdminArticleCategoryController::class, "destroy"])->name("admin.articles.categories.destroy");
            route::post("/store", [AdminArticleCategoryController::class, "store"])->name("admin.articles.categories.store");
            route::get("/show/{id}/{lang}", [AdminArticleCategoryController::class, "show"])->name("admin.articles.categories.show");
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
    // our_team routes
    route::prefix("our_team")->group(function () {
        route::get("/", [AdminOurTeamController::class, "index"])->name("admin.our_team.index");
        route::get("/edit/{id}", [AdminOurTeamController::class, "edit"])->name("admin.our_team.edit");
        route::post("/update/{id}", [AdminOurTeamController::class, "update"])->name("admin.our_team.update");
        route::post("/store", [AdminOurTeamController::class, "store"])->name("admin.our_team.store");
        route::get("/create", [AdminOurTeamController::class, "create"])->name("admin.our_team.create");
        Route::resource('members', 'App\Http\Controllers\Admin\AdminTeamMemberController');
    });

    // footer routes
    // Route::resource('footer/{lang}', 'App\Http\Controllers\Admin\AdminFooter');
    route::prefix("footer")->group(function () {
        route::get("/{lang}", [AdminFooter::class, "index"])->name("admin.footer.index");
        // route::get("/edit/{id}", [AdminFooter::class, "edit"])->name("admin.our_team.edit");
        // route::post("/update/{id}", [AdminFooter::class, "update"])->name("admin.our_team.update");
        route::post("/store", [AdminFooter::class, "store"])->name("admin.footer.store");
        route::get("/create", [AdminFooter::class, "create"])->name("admin.footer.create");
        route::delete("/destroy/{id}", [AdminFooter::class, "destroy"])->name("admin.footer.destroy");
    });
});
// end of admin routing


// writer routing
route::prefix("writer")->middleware(["auth", "writer"])->group(function () {
    route::get("/", [WriterController::class, "index"])->name("writer.index");

    // courses route
    route::prefix("courses")->group(function () {

        // route for showing all courses
        route::get("/", [WriterCourseController::class, "all"])->name("writer.courses.all");
        route::get("/create", [WriterCourseController::class, "create"])->name("writer.courses.create");
        route::post("/store", [WriterCourseController::class, "store"])->name("writer.courses.store");
        route::post("/update/{id}", [WriterCourseController::class, "update"])->name("writer.courses.update");
        route::get("/edit/{id}/{lang}", [WriterCourseController::class, "edit"])->name("writer.courses.edit");
        route::delete("/delete/{id}", [WriterCourseController::class, "destroy"])->name("writer.courses.destroy");


        // route for showing free courses
        route::prefix("free")->group(function () {
            route::get("/", [WriterCourseController::class, "free"])->name("writer.courses.free");
        });

        // route for showing not_free courses
        route::prefix("notfree")->group(function () {
            route::get("/", [WriterCourseController::class, "notfree"])->name("writer.courses.not.free");
        });

        // route for showing online courses
        route::prefix("online")->group(function () {
            route::get("/", [WriterCourseController::class, "online"])->name("writer.courses.online");
        });

        // route for showing offline courses
        route::prefix("offline")->group(function () {
            route::get("/", [WriterCourseController::class, "offline"])->name("writer.courses.offline");
        });
    });


    // route for books
    route::prefix("books")->group(function () {
        route::get("/", [WriterBooksController::class, "index"])->name("writer.books.index");
        route::delete("/destroy/{id}", [WriterBooksController::class, "destroy"])->name("writer.books.destroy");
        route::post("/store", [WriterBooksController::class, "store"])->name("writer.books.store");
    });

    // route for articles
    route::prefix("articles")->group(function () {
        route::get("/farsi", [WriterArticleController::class, "indexfarsi"])->name("writer.articles.farsi.index");
        route::get("/english", [WriterArticleController::class, "indexenglish"])->name("writer.articles.english.index");
        route::get("/show/{id}", [WriterArticleController::class, "show"])->name("writer.articles.show");
        route::delete("/destroy/{id}", [WriterArticleController::class, "destroy"])->name("writer.articles.destroy");
        route::get("/create/{lang}", [WriterArticleController::class, "create"])->name("writer.articles.create");
        route::post("/store", [WriterArticleController::class, "store"])->name("writer.articles.store");
        route::get("/edit/{id}/{lang}", [WriterArticleController::class, "edit"])->name("writer.articles.edit");
        route::post("/update/{id}", [WriterArticleController::class, "update"])->name("writer.articles.update");

        // route for article categories
        route::prefix("categories")->group(function () {
            route::get("/", [WriterArticleCategoryController::class, "index"])->name("writer.articles.categories.index");
            route::delete("/destroy/{id}", [WriterArticleCategoryController::class, "destroy"])->name("writer.articles.categories.destroy");
            route::post("/store", [WriterArticleCategoryController::class, "store"])->name("writer.articles.categories.store");
            route::get("/show/{id}/{lang}", [WriterArticleCategoryController::class, "show"])->name("writer.articles.categories.show");
        });
    });

    // route for invite
    route::prefix("invite_group")->group(function () {
        route::get("/", [WriterInviteCategoryController::class, "index"])->name("writer.invites.category.index");
        route::delete("/destroy/{id}", [WriterInviteCategoryController::class, "destroy"])->name("writer.invites.category.destroy");
        route::post("/store", [WriterInviteCategoryController::class, "store"])->name("writer.invites.category.store");
        route::get("/show/{id}", [WriterInviteCategoryController::class, "show"])->name("writer.invites.category.show");
        // route to show invite pages for each group
        route::prefix("pages")->group(function () {
            route::get("/", [WriterInvitePagesController::class, "index"])->name("writer.invites.pages.index");
            route::get("/edit/{id}", [WriterInvitePagesController::class, "edit"])->name("writer.invites.pages.edit");
            route::post("/update/{id}", [WriterInvitePagesController::class, "update"])->name("writer.invites.pages.update");
            route::post("/store", [WriterInvitePagesController::class, "store"])->name("writer.invites.pages.store");
            route::get("/create", [WriterInvitePagesController::class, "create"])->name("writer.invites.pages.create");
            route::delete("/destroy/{id}", [WriterInvitePagesController::class, "destroy"])->name("writer.invites.pages.destroy");
        });
    });
});
