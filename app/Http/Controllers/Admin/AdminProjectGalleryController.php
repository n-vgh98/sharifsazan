<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ProjectGallery;
use App\Http\Controllers\Controller;

class AdminProjectGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type","App\Models\Projectgallery"],["name",$lang]])->get();
        return view('admin.projects.gallery.index',compact(['languages','lang']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        $languages = Lang::where([["langable_type","App\Models\Project"],["name",$lang]])->get();
        return view('admin.projects.gallery.create',compact(['languages','lang']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project_image = new ProjectGallery();
        $imagename = time() . "." . $request->image->extension();
        $request->image->move(public_path("images/projects/$project_image->project_id/"), $imagename);
        $project_image->path = "images/projects/$project_image->project_id/" . $imagename;
        $project_image->name = $request->input('image_name');
        $project_image->description = $request->input("description");
        $project_image->mode = $request->input('mode');
        $project_image->project_id = $request->input('project_id');
        $project_image->alt = $request->input('alt');
        $project_image->uploader_id = auth()->user()->id;
        $project_image->save();
        //create languages
        $language = new Lang();
        $language->name = $request->lang;
        $project_image->language()->save($language);

        return redirect()->route('admin.projects.gallery.index',$request->lang)->with('success','تصویر جدید با موفقیت ثبت شد.');
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
    public function edit($id,$lang)
    {
        $photo = ProjectGallery::findOrFail($id);
        $languages = Lang::where([["langable_type","App\Models\Project"],["name",$lang]])->get();
        return view('admin.projects.gallery.edit',compact(['photo','languages']));
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
        $project_image = ProjectGallery::findOrFail($id);
        $project_image->name = $request->input('image_name');
        $project_image->description = $request->input("description");
        $project_image->mode = $request->input('mode');
        $project_image->project_id = $request->input('project_id');
        $project_image->alt = $request->input('alt');
        $project_image->uploader_id = auth()->user()->id;
        if ($request->image !== null) {
            unlink($project_image->path);
            $imagename = time() . "." . $request->image->extension();
            $request->image->move(public_path("images/projects/$project_image->project_id/"), $imagename);
            $project_image->path = "images/projects/$project_image->project_id/" . $imagename;
        }
        $project_image->save();
        return redirect()->route('admin.projects.gallery.index',$request->lang)->with("success", "عکس خدمات  با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = ProjectGallery::findOrFail($id);
        unlink($photo->path);
        $photo->language()->delete();
        $photo->delete();
        return redirect()->back()->with("success","حذف شد.");
    }
}
