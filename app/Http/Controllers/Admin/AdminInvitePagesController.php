<?php

namespace App\Http\Controllers\Admin;

use App\Models\InvitePage;
use Illuminate\Http\Request;
use App\Models\InviteCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AdminInvitePagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = InvitePage::all();
        return view("admin.invites.index", compact("pages"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = InviteCategory::all();
        return view("admin.invites.create", compact("categories"));
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
        $filename = $category->title . "." . $category->id;
        $request->image->move(public_path("photos/pages/$filename/"), $imagename);
        $page->image = "photos/pages/$filename/$imagename";
        $page->save();
        return redirect()->route("admin.invites.pages.index")->with("success", "صفحه شما با موفقیت ساخته شد");
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
    public function destroy($id)
    {
        $page = InvitePage::find($id);
        File::delete($page->image);
        $page->delete();
        return redirect()->back()->with("success", "صفحه شما با موفقیت حذف شد");
    }
}
