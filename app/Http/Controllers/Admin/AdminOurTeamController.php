<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\OurTeam;
use Illuminate\Http\Request;

class AdminOurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ourteam = OurTeam::all();
        return view('admin.ourteam.index',compact('ourteam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ourteam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ourteam = new OurTeam();
        $ourteam->text = $request->input('text');
        $ourteam->save();
        return redirect('/our_team')->with("success", "تیم ما با موفقیت ایجاد شد");
        // new image
        $image = new Image();
        $imagename = time() . "." . $request->image->extension();
        $filename = $ourteam->name . "." . $ourteam->id;
        $request->image->move(public_path("photos/our_team/$filename/"), $imagename);
        $image->name = $request->image_name;
        $image->alt = $request->alt;
        $image->uploader_id = auth()->user()->id;
        $image->path = "photos/our_team/$filename/$imagename";
        $ourteam->images()->save($image);
        return redirect('/our_team')->with("success", "تیم ما با موفقیت ایجاد شد");

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
        $ourteam = OurTeam::findOrFail($id);
        return view('admin.ourteam.edit',compact('ourteam'));
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
        $ourteam = OurTeam::findOrFail($id);
        $ourteam->text = $request->input('text');
        $ourteam->save();
        return redirect('/our_team')->with("success", "تیم ما با موفقیت ویرایش شد");
        // edit image
        $image = Image::findOrFail($id);
        $imagename = time() . "." . $request->image->extension();
        $filename = $ourteam->name . "." . $ourteam->id;
        $request->image->move(public_path("photos/our_team/$filename/"), $imagename);
        $image->name = $request->image_name;
        $image->alt = $request->alt;
        $image->uploader_id = auth()->user()->id;
        $image->path = "photos/our_team/$filename/$imagename";
        $ourteam->images()->save($image);
        return redirect('/our_team')->with("success", "تیم ما با موفقیت ویرایش شد");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
