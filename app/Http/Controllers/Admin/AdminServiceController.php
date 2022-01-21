<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Lang;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type","App\Models\Service"],["name",$lang]])->get();
        return view('admin.services.index',compact(["languages","lang"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        $languages = Lang::where([["langable_type","App\Models\ServiceCategory"],["name",$lang]])->get();
        return view("admin.services.create",compact(["languages","lang"]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service= new Service();
        $service->title = $request->input('title');
        if($request->input('slug')){
            $service->slug = make_slug($request->input('slug'));
        }
        else{
            $service->slug = make_slug($request->input('title'));
        }
        $service->category_id = $request->input('category');
        $service->description = $request->input('description');
        $service->meta_keywords = $request->input('meta_keywords');
        $service->meta_description = $request->input('meta_description');
        $service->save();

        //create images
        $image = new Image();
        $image->name = $request->image_name;
        $image->alt = $request->alt;
        $image->uploader_id = auth()->user()->id;
        $imagename = time() . "." . $request->image->extension();
        $request->image->move(public_path("images/services/category/"), $imagename);
        $image->path = "images/services/category/" . $imagename;
        $service->images()->save($image);

        // saving language for services
        $language = new Lang();
        $language->name = $request->lang;
        $service->language()->save($language);

        return redirect()->route('admin.services.index',$request->lang)->with('success','خدمات جدید با موفقیت ثبت شد.');

        
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
        $service = Service::with("category")->where('id',$id)->first();
        return view('admin.services.edit',compact(["service"]));
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
       $service = Service::findOrFail($id);
       $service->title = $request->input('title');
       if($request->input('slug')){
           $service->slug = make_slug($request->input('slug'));
       }
       else{
           $service->slug = make_slug($request->input('title'));
       }
       $service->category_id = $request->input('category');
       $service->description = $request->input('description');
       $service->meta_keywords = $request->input('meta_keywords');
       $service->meta_description = $request->input('meta_description');
       $service->save();
       return redirect()->route('admin.services.index',$request->lang)->with('success','خدمات  با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::with('category')->findOrFail($id);
        unlink($service->images->path);
        $service->images()->delete();
        $service->language()->delete();
        $service->delete();
        return redirect()->back()->with('success','خدمات حذف شد');
    }

    public function updateimage(Request $request, $id)
    {
        $image = Image::find($id);
        $image->name = $request->name;
        $image->alt = $request->alt;
        if ($request->path !== null) {
            unlink($image->path);
            $imagename = time() . "." . $request->path->extension();
            $request->path->move(public_path("images/services/category/"), $imagename);
            $image->path = "images/services/category/" . $imagename;
        }
        $image->save();
        return redirect()->back()->with("success", "عکس خدمات  با موفقیت ویرایش شد");
    }
}
