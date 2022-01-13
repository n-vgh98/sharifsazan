<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use App\Models\Image;
use App\Models\OurTeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminOurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type", "App\Models\OurTeam"], ["name", $lang]])->get();
        return view('admin.ourteam.index',compact('languages','lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        return view('admin.ourteam.create',compact('lang'));
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
        //store new image for our_team
        $image_1 = new Image();
        $imagename = time() . "." . $request->image_1->getClientOriginalName();
        $filename = $ourteam->name . "." . $ourteam->id;
        $request->image_1->move(public_path("photos/our_team/$filename/"), $imagename);
        $image_1->name = $request->image_1_name;
        $image_1->alt = $request->alt_1;
        $image_1->uploader_id = auth()->user()->id;
        $image_1->path = "photos/our_team/$filename/$imagename";
        $ourteam->images()->save($image_1);

        $image_2 = new Image();
        $imagename = time() . "." . $request->image_2->getClientOriginalName();
        $filename = $ourteam->name . "." . $ourteam->id;
        $request->image_2->move(public_path("photos/our_team/$filename/"), $imagename);
        $image_2->name = $request->image_2_name;
        $image_2->alt = $request->alt_2;
        $image_2->uploader_id = auth()->user()->id;
        $image_2->path = "photos/our_team/$filename/$imagename";
        $ourteam->images()->save($image_2);

        $image_3 = new Image();
        $imagename = time() . "." . $request->image_3->getClientOriginalName();
        $filename = $ourteam->name . "." . $ourteam->id;
        $request->image_3->move(public_path("photos/our_team/$filename/"), $imagename);
        $image_3->name = $request->image_3_name;
        $image_3->alt = $request->alt_3;
        $image_3->uploader_id = auth()->user()->id;
        $image_3->path = "photos/our_team/$filename/$imagename";
        $ourteam->images()->save($image_3);

        $language = new Lang();
        $language->name = $request->lang;
        $ourteam->language()->save($language);

        return redirect()->route('admin.our_team.index',$request->lang)->with("success", "تیم ما با موفقیت ایجاد شد");

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
        if($file = $request->file('image_1')) {
            $image_1 = Image::findOrFail($ourteam->images[0]->id);
            $imagename = time() . "." . $request->image_1->getClientOriginalName();
            $filename = $ourteam->name . "." . $ourteam->id;
            $request->image_1->move(public_path("photos/our_team/$filename/"), $imagename);
            $image_1->name = $request->image_1_name;
            $image_1->alt = $request->alt_1;
            $image_1->uploader_id = auth()->user()->id;
            $image_1->path = "photos/our_team/$filename/$imagename";
            $ourteam->images()->save($image_1);
        }
        if($file = $request->file('image_1')) {
            $image_2 = Image::findOrFail($ourteam->images[1]->id);
            $imagename = time() . "." . $request->image_2->getClientOriginalName();
            $filename = $ourteam->name . "." . $ourteam->id;
            $request->image_2->move(public_path("photos/our_team/$filename/"), $imagename);
            $image_2->name = $request->image_2_name;
            $image_2->alt = $request->alt_2;
            $image_2->uploader_id = auth()->user()->id;
            $image_2->path = "photos/our_team/$filename/$imagename";
            $ourteam->images()->save($image_2);
        }
        if($file = $request->file('image_1')) {
            $image_3 = Image::findOrFail($ourteam->images[2]->id);
            $imagename = time() . "." . $request->image_3->getClientOriginalName();
            $filename = $ourteam->name . "." . $ourteam->id;
            $request->image_3->move(public_path("photos/our_team/$filename/"), $imagename);
            $image_3->name = $request->image_3_name;
            $image_3->alt = $request->alt_3;
            $image_3->uploader_id = auth()->user()->id;
            $image_3->path = "photos/our_team/$filename/$imagename";
            $ourteam->images()->save($image_3);
        }

        $ourteam->text = $request->input('text');
        $ourteam->save();

        return redirect()->route('admin.our_team.index')->with("success", "تیم ما با موفقیت ویرایش شد");

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
