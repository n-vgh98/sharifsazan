<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminFooter;
use App\Http\Controllers\Admin\AdminContact;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Writer\WriterController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Front\UserBooksController;
use App\Http\Controllers\Front\UserPanelController;
use App\Http\Controllers\Admin\AdminBooksController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Front\UserArticleController;
use App\Http\Controllers\Front\UserCoursesController;
use App\Http\Controllers\Front\UserProjectController;
use App\Http\Controllers\Front\UserServiceController;
use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminKarnameController;
use App\Http\Controllers\Admin\AdminOurTeamController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Writer\WriterBooksController;
use App\Http\Controllers\Front\UserContactUsController;
use App\Http\Controllers\Writer\WriterCourseController;
use App\Http\Controllers\Front\UserWorkWithUsController;
use App\Http\Controllers\Writer\WriterArticleController;
use App\Http\Controllers\Admin\AdminTeamMemberController;
use App\Http\Controllers\Admin\AdminIndexSliderController;
use App\Http\Controllers\Admin\AdminInvitePagesController;
use App\Http\Controllers\Admin\AdminNotificationController;
use App\Http\Controllers\Admin\AdminShoppingListController;
use App\Http\Controllers\Front\UserNotificiationsController;
use App\Http\Controllers\Writer\WriterInvitePagesController;
use App\Http\Controllers\Admin\AdminInviteCategoryController;
use App\Http\Controllers\Admin\AdminPageDecorationController;
use App\Http\Controllers\Admin\AdminProjectGalleryController;
use App\Http\Controllers\Admin\AdminArticleCategoryController;
use App\Http\Controllers\Admin\AdminServiceCategoryController;
use App\Http\Controllers\Writer\WriterInviteCategoryController;
use App\Http\Controllers\Writer\WriterArticleCategoryController;

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


route::get("/", function () {
    return redirect()->route("home");
})->middleware("language");

Route::prefix('/{locale}')->middleware("language")->group(function () {
    Auth::routes();

    // routing for user panel
    Route::prefix('panel')->middleware("auth")->group(function () {
        route::get("/", [UserPanelController::class, "index"])->name("panel.index");
        route::post("/updatePassword", [UserPanelController::class, "updatePassword"])->name("panel.updatePassword");
        route::post("/updateInformation", [UserPanelController::class, "updateInformation"])->name("panel.updateInformation");
    });

    Route::prefix('commets')->middleware("auth")->group(function () {
        route::post("/store", [AdminCommentController::class, "store"])->name("user.comments.store");
    });

    route::get("/", [HomeController::class, "index"])->name("home");

    // routing for user contactus
    Route::prefix('contact_us')->group(function () {
        route::get("/", [UserContactUsController::class, "index"])->name("contactus.index");
        route::post("/store", [UserContactUsController::class, "store"])->name("contactus.store");
    });

    // routing for user books
    Route::prefix('bookshelf')->group(function () {
        route::get("/", [UserBooksController::class, "index"])->name("bookshelf.index");
    });

    // routing for user notifications
    Route::prefix('notification')->group(function () {
        route::get("/", [UserNotificiationsController::class, "index"])->name("user.notifications.all");
    });

    // routing for user articl categories
    Route::prefix('article_categories')->group(function () {
        route::get("/{id}", [UserArticleController::class, "index"])->name("article.category.index");
        route::get("/show/{id}", [UserArticleController::class, "show"])->name("article.category.show");
    });
     
    //services front route
    route::get("service/{slug}",[UserServiceController::class, "index"])->name("service.index");

    //projects front routes
    route::get("project",[UserProjectController::class, "index"])->name("project.index");

    // routing for user courses
    Route::prefix('Courses')->group(function () {
        route::get("/", [UserCoursesController::class, "index"])->name("front.courses.all");
        route::get("/show/{id}", [UserCoursesController::class, "show"])->name("front.courses.show");
        route::Post("/searchcourse", [UserCoursesController::class, "search"])->name("front.courses.search");
    });

    // order routes
    route::prefix("shopping_list")->middleware("auth")->group(function () {
        route::get("/", [AdminShoppingListController::class, "index"])->name("user.shopping.list.index");
        route::post("/add/{id}", [AdminShoppingListController::class, "add"])->name("user.shopping.list.add");
    });

    // order routes
    route::prefix("work_with_us")->group(function () {
        route::get("/{id}", [UserWorkWithUsController::class, "show"])->name("user.work.with.us.show");
        route::get("/sabtename/{id}", [UserWorkWithUsController::class, "sabtename"])->name("user.work.with.us.sabtename");
        route::get("/fani/{id}", [UserWorkWithUsController::class, "fani"])->name("user.work.with.us.fani");
        route::get("/karname/{id}", [UserWorkWithUsController::class, "karname"])->name("user.work.with.us.karname");
        route::get("/amali/{id}", [UserWorkWithUsController::class, "amali"])->name("user.work.with.us.amali");
    });
});



Route::get('fa/recovery', [App\Http\Controllers\Admin\AdminBooksController::class, 'check'])->name('home.check');


// admin routing
route::prefix("admin")->middleware(["auth", "admin"])->group(function () {
    route::get("/home", [AdminController::class, "index"])->name("admin.home");

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

    route::prefix("index_slider")->group(function () {
        route::get("/{lang}", [AdminIndexSliderController::class, "index"])->name("admin.index.slider.index");
        route::post("/store", [AdminIndexSliderController::class, "store"])->name("admin.index.slider.store");
        route::post("/update/{id}", [AdminIndexSliderController::class, "update"])->name("admin.index.slider.update");
        route::delete("/destroy/{id}", [AdminIndexSliderController::class, "destroy"])->name("admin.index.slider.destroy");
    });

    // route for karname
    route::prefix("karname")->group(function () {
        route::post("/{id}", [AdminKarnameController::class, "store"])->name("admin.karname.store");
        route::post("/update/{id}", [AdminKarnameController::class, "update"])->name("admin.karname.update");
    });



    //route for page_decoration
    route::prefix("page_decoration")->group(function () {
        route::get("/{lang}", [AdminPageDecorationController::class, "index"])->name("admin.page.decoration.index");
        route::get("/create/{lang}", [AdminPageDecorationController::class, "create"])->name("admin.page.decoration.create");
        route::post("/store", [AdminPageDecorationController::class, "store"])->name("admin.page.decoration.store");
        route::get("/edit/{id}", [AdminPageDecorationController::class, "edit"])->name("admin.page.decoration.edit");
        route::patch("update/{id}", [AdminPageDecorationController::class, "update"])->name("admin.page.decoration.update");
        route::delete("destroy/{id}", [AdminPageDecorationController::class, "destroy"])->name("admin.page.decoration.destroy");
        route::post("articles/updateimage/{id}", [AdminPageDecorationController::class, "updateimage"])->name("admin.page.decoration.update.image");
    });

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
        route::get("/farsi", [AdminCourseController::class, "farsi"])->name("admin.courses.all.farsi");
        route::get("/english", [AdminCourseController::class, "english"])->name("admin.courses.all.english");
        route::get("/create", [AdminCourseController::class, "create"])->name("admin.courses.create");
        route::post("/store", [AdminCourseController::class, "store"])->name("admin.courses.store");
        route::post("/update/{id}", [AdminCourseController::class, "update"])->name("admin.courses.update");
        route::get("/edit/{id}", [AdminCourseController::class, "edit"])->name("admin.courses.edit");
        route::delete("/delete/{id}", [AdminCourseController::class, "destroy"])->name("admin.courses.destroy");


        // route for showing free courses
        route::prefix("free")->group(function () {
            route::get("/", [AdminCourseController::class, "free"])->name("admin.courses.free");
            route::get("/farsi", [AdminCourseController::class, "freeFa"])->name("admin.courses.free.farsi");
            route::get("/english", [AdminCourseController::class, "freeEn"])->name("admin.courses.free.english");
        });

        // route for showing not_free courses
        route::prefix("notfree")->group(function () {
            route::get("/", [AdminCourseController::class, "notfree"])->name("admin.courses.not.free");
            route::get("/english", [AdminCourseController::class, "notfreeEn"])->name("admin.courses.not.free.english");
            route::get("/farsi", [AdminCourseController::class, "notfreeFa"])->name("admin.courses.not.free.farsi");
        });

        // route for showing online courses
        route::prefix("online")->group(function () {
            route::get("/", [AdminCourseController::class, "online"])->name("admin.courses.online");
            route::get("/farsi", [AdminCourseController::class, "onlineFa"])->name("admin.courses.online.farsi");
            route::get("/english", [AdminCourseController::class, "onlineEn"])->name("admin.courses.online.english");
        });

        // route for showing offline courses
        route::prefix("offline")->group(function () {
            route::get("/", [AdminCourseController::class, "offline"])->name("admin.courses.offline");
            route::get("/farsi", [AdminCourseController::class, "offlineFa"])->name("admin.courses.offline.farsi");
            route::get("/english", [AdminCourseController::class, "offlineEn"])->name("admin.courses.offline.english");
        });
    });

    // route for books
    route::prefix("books")->group(function () {
        route::get("/", [AdminBooksController::class, "all"])->name("admin.books.all");
        route::get("/english", [AdminBooksController::class, "english"])->name("admin.books.english");
        route::get("/farsi", [AdminBooksController::class, "farsi"])->name("admin.books.farsi");
        route::delete("/destroy/{id}", [AdminBooksController::class, "destroy"])->name("admin.books.destroy");
        route::post("/store", [AdminBooksController::class, "store"])->name("admin.books.store");
        route::post("/update/{id}", [AdminBooksController::class, "update"])->name("admin.books.update");
    });

    // route for articles
    route::prefix("articles")->group(function () {
        route::get("/", [AdminArticleController::class, "all"])->name("admin.articles.all");
        route::get("/english", [AdminArticleController::class, "english"])->name("admin.articles.english");
        route::get("/farsi", [AdminArticleController::class, "farsi"])->name("admin.articles.farsi");
        route::get("/create/{lang}", [AdminArticleController::class, "create"])->name("admin.articles.create");
        route::post("/store", [AdminArticleController::class, "store"])->name("admin.articles.store");
        route::get("/edit/{id}", [AdminArticleController::class, "edit"])->name("admin.articles.edit");
        route::post("/update/{id}", [AdminArticleController::class, "update"])->name("admin.articles.update");
        route::delete("/destroy/{id}", [AdminArticleController::class, "destroy"])->name("admin.articles.destroy");

        // route for article categories
        route::prefix("categories")->group(function () {
            route::get("/", [AdminArticleCategoryController::class, "all"])->name("admin.articles.categories.all");
            route::get("/farsi", [AdminArticleCategoryController::class, "farsi"])->name("admin.articles.categories.farsi");
            route::get("/english", [AdminArticleCategoryController::class, "english"])->name("admin.articles.categories.english");
            route::delete("/destroy/{id}", [AdminArticleCategoryController::class, "destroy"])->name("admin.articles.categories.destroy");
            route::post("/store", [AdminArticleCategoryController::class, "store"])->name("admin.articles.categories.store");
            route::get("/show/{id}/{lang}", [AdminArticleCategoryController::class, "show"])->name("admin.articles.categories.show");
        });
    });

    //Projects routes
    route::prefix("projects")->group(function () {
        route::get("/{lang}", [AdminProjectController::class, "index"])->name("admin.projects.index");
        route::get("/create/{lang}", [AdminProjectController::class, "create"])->name("admin.projects.create");
        route::post("/store", [AdminProjectController::class, "store"])->name("admin.projects.store");
        route::post("/update/{id}", [AdminProjectController::class, "update"])->name("admin.projects.update");
        route::get("/edit/{id}/{lang}", [AdminProjectController::class, "edit"])->name("admin.projects.edit");
        route::delete("/delete/{id}", [AdminProjectController::class, "destroy"])->name("admin.projects.destroy");
        route::post("/updateimage/{id}", [AdminProjectController::class, "updateimage"])->name("admin.projects.update.image");
        //Service Categories routes
        route::prefix("gallery")->group(function () {
            route::get("/{lang}", [AdminProjectGalleryController::class, "index"])->name("admin.projects.gallery.index");
            route::get("/create/{lang}", [AdminProjectGalleryController::class, "create"])->name("admin.projects.gallery.create");
            route::post("/store", [AdminProjectGalleryController::class, "store"])->name("admin.projects.gallery.store");
            route::post("/update/{id}", [AdminProjectGalleryController::class, "update"])->name("admin.projects.gallery.update");
            route::get("/edit/{id}/{lang}", [AdminProjectGalleryController::class, "edit"])->name("admin.projects.gallery.edit");
            route::delete("/delete/{id}", [AdminProjectGalleryController::class, "destroy"])->name("admin.projects.gallery.destroy");
        });
    });

    //Service routes
    route::prefix("services")->group(function () {
        route::get("/{lang}", [AdminServiceController::class, "index"])->name("admin.services.index");
        route::get("/create/{lang}", [AdminServiceController::class, "create"])->name("admin.services.create");
        route::post("/store", [AdminServiceController::class, "store"])->name("admin.services.store");
        route::post("/update/{id}", [AdminServiceController::class, "update"])->name("admin.services.update");
        route::get("/edit/{id}", [AdminServiceController::class, "edit"])->name("admin.services.edit");
        route::delete("/delete/{id}", [AdminServiceController::class, "destroy"])->name("admin.services.destroy");
        route::post("/updateimage/{id}", [AdminServiceController::class, "updateimage"])->name("admin.services.update.image");
        //Service Categories routes
        route::prefix("category")->group(function () {
            route::get("/{lang}", [AdminServiceCategoryController::class, "index"])->name("admin.services.category.index");
            route::get("/create", [AdminServiceCategoryController::class, "create"])->name("admin.services.category.create");
            route::post("/store", [AdminServiceCategoryController::class, "store"])->name("admin.services.category.store");
            route::post("/update/{id}", [AdminServiceCategoryController::class, "update"])->name("admin.services.category.update");
            route::get("/edit/{id}", [AdminServiceCategoryController::class, "edit"])->name("admin.services.category.edit");
            route::delete("/delete/{id}", [AdminServiceCategoryController::class, "destroy"])->name("admin.services.category.destroy");
        });
    });

    // route for invite
    route::prefix("invite_group")->group(function () {
        route::get("/", [AdminInviteCategoryController::class, "all"])->name("admin.invites.category.all");
        route::get("/farsi", [AdminInviteCategoryController::class, "farsi"])->name("admin.invites.category.farsi");
        route::get("/english", [AdminInviteCategoryController::class, "english"])->name("admin.invites.category.english");
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
        route::get("/{lang}", [AdminOurTeamController::class, "index"])->name("admin.our_team.index");
        route::get("/edit/{id}", [AdminOurTeamController::class, "edit"])->name("admin.our_team.edit");
        route::post("/update/{id}", [AdminOurTeamController::class, "update"])->name("admin.our_team.update");
        route::post("/store", [AdminOurTeamController::class, "store"])->name("admin.our_team.store");
        route::get("/create/{lang}", [AdminOurTeamController::class, "create"])->name("admin.our_team.create");
    });
    route::prefix("memebrs")->group(function () {
        route::get("/{lang}", [AdminTeamMemberController::class, "index"])->name("admin.our_team.member.index");
        // route::get("/edit/{id}", [AdminTeamMemberController::class, "edit"])->name("admin.our_team.member.edit");
        route::post("/update/{id}", [AdminTeamMemberController::class, "update"])->name("admin.our_team.member.update");
        route::post("/store", [AdminTeamMemberController::class, "store"])->name("admin.our_team.member.store");
        // route::get("/create/{lang}", [AdminTeamMemberController::class, "create"])->name("admin.our_team.member.create");
        route::delete("/destroy/{id}", [AdminTeamMemberController::class, "destroy"])->name("admin.our_team.member.destroy");
        route::post("/updateimage/{id}", [AdminTeamMemberController::class, "updateimage"])->name("admin.our_team.member.update.image");
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

    // routes for comments
    route::prefix("comments")->group(function () {
        route::get("/", [AdminCommentController::class, "index"])->name("admin.comments.index");
        route::post("/accept/{id}", [AdminCommentController::class, "accept"])->name("admin.comments.accept");
        route::post("/store", [AdminCommentController::class, "store"])->name("admin.comments.store");
        route::post("/decline/{id}", [AdminCommentController::class, "decline"])->name("admin.comments.decline");
        route::delete("/destroy/{id}", [AdminCommentController::class, "destroy"])->name("admin.comments.destroy");
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

    //Service routes
    route::prefix("services")->group(function () {
        route::get("/", [AdminServiceController::class, "index"])->name("writer.services.index");
        route::get("/create", [AdminServiceController::class, "create"])->name("writer.services.create");
        route::post("/store", [AdminServiceController::class, "store"])->name("writer.services.store");
        route::post("/update/{id}", [AdminServiceController::class, "update"])->name("writer.services.update");
        route::get("/edit/{id}/{lang}", [AdminServiceController::class, "edit"])->name("writer.services.edit");
        route::delete("/delete/{id}", [AdminServiceController::class, "destroy"])->name("writer.services.destroy");
        //Service Categories routes
        route::prefix("category")->group(function () {
            route::get("/", [AdminServiceCategoryController::class, "index"])->name("writer.services.category.index");
            route::get("/create", [AdminServiceCategoryController::class, "create"])->name("writer.services.category.create");
            route::post("/store", [AdminServiceCategoryController::class, "store"])->name("writer.services.category.store");
            route::post("/update/{id}", [AdminServiceCategoryController::class, "update"])->name("writer.services.category.update");
            route::get("/edit/{id}/{lang}", [AdminServiceCategoryController::class, "edit"])->name("writer.services.category.edit");
            route::delete("/delete/{id}", [AdminServiceCategoryController::class, "destroy"])->name("writer.services.category.destroy");
        });
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
