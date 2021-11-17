<?php

namespace App\Http\Controllers\Writer;

use App\Models\Image;
use App\Models\InvitePage;
use Illuminate\Http\Request;
use App\Models\InviteCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class WriterInvitePagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = InvitePage::all();
        return view("writer.invites.index", compact("pages"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = InviteCategory::all();
        return view("writer.invites.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = InviteCategory::find($request->category_id);
        $page = new InvitePage();
        $imagename = time() . "." . $request->image->extension();
        $page->title = $request->title;
        $page->category_id = $request->category_id;
        $page->text1 = $request->text1;
        $page->text2 = $request->text2;
        $page->save();

        // saving image in image table
        $image = new Image();
        $imagename = time() . "." . $request->image->extension();
        $filename = $category->title . "." . $category->id;
        $request->image->move(public_path("photos/pages/$filename/"), $imagename);
        $image->name = $request->image_name;
        $image->alt = $request->alt;
        $image->uploader_id = auth()->user()->id;
        $image->path = "photos/pages/$filename/$imagename";
        $page->images()->save($image);
        // saving image in image table
        return redirect()->route("writer.invites.pages.index")->with("success", "صفحه شما با موفقیت ساخته شد");
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
        $categories = InviteCategory::all();
        $page = InvitePage::find($id);
        return view("writer.invites.edit", compact("page", "categories"));
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
        $page = InvitePage::find($id);
        $page->title = $request->title;
        $page->category_id = $request->category_id;
        $page->text1 = $request->text1;
        $page->text2 = $request->text2;
        $page->save();
        return redirect()->route("writer.invites.pages.index")->with("success", "صفحه شما با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = InvitePage::find($id);
        $path = pathinfo($page->images[0]->path)["dirname"];
        foreach ($page->images as $image) {
            File::delete($image->path);
        }
        rmdir($path);
        $page->images()->delete();
        $page->delete();
        return redirect()->back()->with("success", "صفحه شما با موفقیت حذف شد");
    }
}
