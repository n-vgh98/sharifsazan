<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;

class AdminServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type", "App\Models\ServiceCategory"], ["name", $lang]])->get();
        return view('admin.services.category.index',compact('languages','lang'));
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
        $category = new ServiceCategory();
        $category->title = $request->input('title');
        if($request->input('slug')){
            $category->slug = make_slug($request->input('slug'));
        }
        else{
            $category->slug = make_slug($request->input('title'));
        }
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_description = $request->input('meta_description');
        $category->save();

         // saving language for footer
         $language = new Lang();
         $language->name = $request->lang;
         $category->language()->save($language);

        return redirect()->route('admin.services.category.index',$request->lang)->with("success", "دسته جدید با موفقیت ثبت شد");
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
        $category =ServiceCategory::findOrFail($id);
        $category->title = $request->input('title');
        if($request->input('slug')){
            $category->slug = make_slug($request->input('slug'));
        }
        else{
            $category->slug = make_slug($request->input('title'));
        }
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_description = $request->input('meta_description');
        $category->save();


        return redirect()->back()->with("success", "دسته  با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= ServiceCategory::findOrFail($id);
        $category->delete();
        $category->language()->delete();
        return redirect()->back()->with('success','حذف شد.');
    }
}
