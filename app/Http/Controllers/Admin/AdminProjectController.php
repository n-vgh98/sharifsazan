<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use App\Models\Image;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $project->status = $request->input('status');
        $project->description = $request->input('description');
        $project->save();

         //create images
         $image = new Image();
         $image->name = $request->image_name;
         $image->alt = $request->alt;
         $image->uploader_id = auth()->user()->id;
         $imagename = time() . "." . $request->image->extension();
         $request->image->move(public_path("images/projects/main/"), $imagename);
         $image->path = "images/projects/main/" . $imagename;
         $project->images()->save($image);

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
        $project = Project::with('images')->findOrFail($id);
        return view('admin.projects.edit',compact('project'));
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
        $project->status = $request->input('status');
        $project->save();

        return redirect()->route('admin.projects.index',$request->lang)->with("success", "پروژه با موفقیت ویرایش شد");

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
        unlink($project->images->path);
        $project->images()->delete();
        $project->delete();
        $project->language()->delete();
        return redirect()->back()->with("success", "پروژه با موفقیت حذف شد");
    }

    public function updateimage(Request $request, $id)
    {
        $image = Image::find($id);
        $image->name = $request->name;
        $image->alt = $request->alt;
        if ($request->path !== null) {
            unlink($image->path);
            $imagename = time() . "." . $request->path->extension();
            $request->path->move(public_path("images/projects/main/"), $imagename);
            $image->path = "images/projects/main/" . $imagename;
        }
        $image->save();
        return redirect()->back()->with("success", "عکس خدمات  با موفقیت ویرایش شد");
    }
}
