<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use App\Models\Image;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AdminTeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type", "App\Models\TeamMember"], ["name", $lang]])->get();
        return view('admin.ourteam.members.index',compact('languages','lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $members = new TeamMember();
        $members->name = $request->input('name');
        $members->job_title = $request->input('job_title');
        $members->education = $request->input('education');
        $members->attribute = $request->input('attribute');
        $members->admin = $request->input('admin');
        $members->mode = $request->input('mode');
        $members->save();

        //saving image member    
        $image = new Image();
        $image->name = $request->img_name;
        $image->alt = $request->alt;
        $image->uploader_id = auth()->user()->id;
        $imagename = time() . "." . $request->path->extension();
        $request->path->move(public_path("images/ourteam/members/"), $imagename);
        $image->path = "images/ourteam/members/" . $imagename;
        $members->images()->save($image);

         // saving language for footer
         $language = new Lang();
         $language->name = $request->lang;
         $members->language()->save($language);

        return redirect()->route('admin.our_team.member.index',$request->lang)->with("success", "همکار با موفقیت ثبت شد");
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
        $members = TeamMember::findOrFail($id);
        $members->name = $request->input('name');
        $members->job_title = $request->input('job_title');
        $members->education = $request->input('education');
        $members->attribute = $request->input('attribute');
        $members->admin = $request->input('admin');
        $members->mode = $request->input('mode');
        $members->save();

        return redirect()->back()->with("success", "همکار با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = TeamMember::findOrFail($id);
        $image = $member->images[0];
        unlink($image->path);
        $image->delete();
        $member->delete();
        $member->language()->delete();
        return redirect()->back()->with("success","همکار حذف شد.");
    }

    public function updateimage(Request $request, $id)
    {
        $image = Image::findOrFail($id);
        $image->name = $request->name;
        $image->alt = $request->alt;
        if ($request->path !== null) {
            unlink($image->path);
            $imagename = time() . "." . $request->path->extension();
            $request->path->move(public_path("images/ourteam/members/"), $imagename);
            $image->path = "images/ourteam/members/" . $imagename;
        }
        $image->save();
        return redirect()->back()->with("success", "عکس همکار  با موفقیت ویرایش شد");
    }
}
