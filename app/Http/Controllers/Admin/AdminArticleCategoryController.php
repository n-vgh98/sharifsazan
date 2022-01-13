<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use App\Models\EnglishArticleCategory;
use App\Models\Lang;
use Illuminate\Http\Request;

class AdminArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $languages = Lang::where("langable_type", "App\Models\ArticleCategory")->get();
        return view("admin.articles.category.index", compact("languages"));
    }

    public function farsi()
    {
        $languages = Lang::where([["name", "fa"], ["langable_type", "App\Models\ArticleCategory"]])->get();
        return view("admin.articles.category.index", compact("languages"));
    }

    public function english()
    {
        $languages = Lang::where([["name", "en"], ["langable_type", "App\Models\ArticleCategory"]])->get();
        return view("admin.articles.category.index", compact("languages"));
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
        if ($request->lang == 0) {
            $category = new ArticleCategory();
            $category->title = $request->title;
            $category->save();
            $articlelang = new Lang();
            $articlelang->name = "fa";
            $category->language()->save($articlelang);
            return redirect()->back()->with("success", "دسته بندی شما با موفقیت اضافه شد");
        }

        if ($request->lang == 1) {
            $category = new ArticleCategory();
            $category->title = $request->title;
            $category->save();
            $articlelang = new Lang();
            $articlelang->name = "en";
            $category->language()->save($articlelang);
            return redirect()->back()->with("success", "دسته بندی شما با موفقیت اضافه شد");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $lang)
    {
        $language = Lang::where([["langable_id", $id], ["langable_type", "App\Models\ArticleCategory"]])->first();
        return view("admin.articles.category.show", compact("language"));
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
    public function destroy(Request $request, $id)
    {

        // check if category is farsi
        if ($request->lang == 0) {
            $category = ArticleCategory::find($id);
            $language = Lang::findorfail($category->language->id);
            $language->delete();
            $category->delete();
            return redirect()->back()->with("success", "دسته بندی مورد نظر شما و تمامی مقالات درون این دسته بندی با موفقیت حذف شد");
        }
    }
}
