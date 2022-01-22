<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use App\Models\Project;
use Illuminate\Http\Request;

class AdminProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type","App\Models\Project"],["name",$lang]])->get();
        return view('admin.projects.index',compact(['languages','lang']));
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
        $project = new Project();
        $project->name = $request->input('name');
        $project->type = $request->input('type');
        $project->year = $request->input('year');
        $project->floor = $request->input('floor');
        $project->location = $request->input('location');
        $project->customer_name = $request->input('customer_name');
        $project->area = $request->input('area');
        $project->description = $request->input('description');
        $project->save();

        // saving language for footer
        $language = new Lang();
        $language->name = $request->lang;
        $project->language()->save($language);
        return redirect()->route('admin.projects.index',$request->lang)->with("success", "پروژه با موفقیت ثبت شد");
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
        $project = Project::findOrFail($id);
        $project->name = $request->input('name');
        $project->type = $request->input('type');
        $project->year = $request->input('year');
        $project->floor = $request->input('floor');
        $project->location = $request->input('location');
        $project->customer_name = $request->input('customer_name');
        $project->area = $request->input('area');
        $project->description = $request->input('description');
        $project->save();

        return redirect()->back()->with("success", "پروژه با موفقیت ویرایش شد");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        $project->language()->delete();
        return redirect()->back()->with("success", "پروژه با موفقیت حذف شد");
    }
}
