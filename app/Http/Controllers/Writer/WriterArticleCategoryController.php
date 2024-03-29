<?php

namespace App\Http\Controllers\Writer;

use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use App\Http\Controllers\Controller;
use App\Models\EnglishArticleCategory;

class WriterArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ArticleCategory::all();
        $englishcategories = EnglishArticleCategory::all();
        return view("writer.articles.category.index", compact("categories", "englishcategories"));
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
            return redirect()->back()->with("success", "دسته بندی شما با موفقیت اضافه شد");
        }

        if ($request->lang == 1) {
            $category = new EnglishArticleCategory();
            $category->title = $request->title;
            $category->save();
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
        // check if category is farsi
        if ($lang == 0) {
            $category = ArticleCategory::find($id);
            return view("writer.articles.category.show", compact("category", "lang"));
        }

        // check if category is english
        if ($lang == 1) {
            $category = EnglishArticleCategory::find($id);
            return view("writer.articles.category.show", compact("category", "lang"));
        }
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
            $category->delete();
            return redirect()->back()->with("success", "دسته بندی مورد نظر شما و تمامی مقالات درون این دسته بندی با موفقیت حذف شد");
        }
        // check if category is english
        if ($request->lang == 1) {
            $category = EnglishArticleCategory::find($id);
            $category->delete();
            return redirect()->back()->with("success", "دسته بندی مورد نظر شما و تمامی مقالات درون این دسته بندی با موفقیت حذف شد");
        }
    }
}
