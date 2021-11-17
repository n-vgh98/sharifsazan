<?php

namespace App\Http\Controllers\Writer;

use Illuminate\Http\Request;
use App\Models\InviteCategory;
use App\Http\Controllers\Controller;

class WriterInviteCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = InviteCategory::all();
        return view("writer.invites.category.index", compact("categories"));
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
        $category = new InviteCategory();
        $category->title = $request->title;
        $category->practical_exam_form_link = $request->practical_exam_form_link;
        $category->technical_exam_form_link = $request->technical_exam_form_link;
        $category->register_form_link = $request->register_form_link;
        $category->save();
        return redirect()->route("writer.invites.category.index")->with("success", "گروه مورد نظر شما با موفقیت انجام شد");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = InviteCategory::find($id);
        return view("writer.invites.category.show", compact("category"));
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
        $category = InviteCategory::find($id);
        $category->delete();
        return redirect()->back()->with("success", "گروه مورد نظر شما با موفقیت حذف شد");
    }
}
