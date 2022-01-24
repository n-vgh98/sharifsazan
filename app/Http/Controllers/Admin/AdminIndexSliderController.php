<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use App\Models\Image;
use App\Models\IndexSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminIndexSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        // dd($lang);
        $languages = Lang::where([["langable_type", "App\Models\IndexSlider"], ["name", $lang]])->get();
        return view("admin.indexslider.index", compact("languages", "lang"));
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
        // dd($request->all());
        $sliderimage = new IndexSlider();
        $sliderimage->save();
        $image = new Image();
        $imagename = time() . "." . $request->path->extension();
        $request->path->move(public_path("images/index/slider/"), $imagename);
        $image->path = "images/index/slider/" . $imagename;
        $image->name = $request->name;
        $image->alt = $request->alt;
        $image->uploader_id = auth()->user()->id;
        $sliderimage->detail()->save($image);
        // saving language for article
        $language = new Lang();
        $language->name = $request->lang;
        $sliderimage->language()->save($language);
        return redirect()->back()->with("success", "دوره شما با موفقیت ذخیره شد");
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
        $image = IndexSlider::find($id);
        $image->detail->alt = $request->alt;
        $image->detail->name = $request->name;
        $image->detail->uploader_id = auth()->user()->id;
        if ($request->path !== null) {
            unlink($image->detail->path);
            $imagename = time() . "." . $request->path->extension();
            $request->path->move(public_path("images/index/slider/"), $imagename);
            $image->detail->path = "images/index/slider/" . $imagename;
        }
        $image->detail->save();
        return redirect()->back()->with("success", "دوره شما با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = IndexSlider::find($id);
        unlink($image->detail->path);
        $image->detail->delete();
        $image->delete();
        $image->language()->delete();
        return redirect()->back()->with("fail", "دوره شما با موفقیت حذف شد");
    }
}
