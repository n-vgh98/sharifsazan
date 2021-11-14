<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CreateArticleRequest;
use App\Models\EnglishArticle;
use App\Models\FarsiArticle;

class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexfarsi()
    {
        $articles = FarsiArticle::all();
        return view("admin.articles.index", compact("articles"));
    }

    public function indexenglish()
    {
        $articles = EnglishArticle::all();
        return view("admin.articles.index", compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ArticleCategory::all();
        return view("admin.articles.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticleRequest $request)
    {
        // check if language of article is farsi or not?
        if ($request->language = 0) {
            $category = ArticleCategory::find($request->category_id)->first();
            $article = new FarsiArticle();
            $article->title = $request->title;
            $article->category_id = $request->category_id;
            $article->text = $request->text;
            $imagename = time() . "." . $request->image->extension();
            $filename = $article->title . "." . $category->id;
            $request->image->move(public_path("photos/articles/$category->title/$filename/"), $imagename);
            $article->image = "photos/articles/$category->title/$filename/$imagename";
            $article->save();
            return redirect()->route("admin.articles.index")->with("success", "مقاله شما با موفقیت ساخته شد");
        }

        // check if language of article is english or not?
        if ($request->language = 1) {
            $category = ArticleCategory::find($request->category_id)->first();
            $article = new EnglishArticle();
            $article->title = $request->title;
            $article->category_id = $request->category_id;
            $article->text = $request->text;
            $imagename = time() . "." . $request->image->extension();
            $filename = $article->title . "." . $category->id;
            $request->image->move(public_path("photos/articles/$category->title/$filename/"), $imagename);
            $article->image = "photos/articles/$category->title/$filename/$imagename";
            $article->save();
            return redirect()->route("admin.articles.index")->with("success", "مقاله شما با موفقیت ساخته شد");
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyfarsi($id)
    {
        // destroy farsi articles
        $article = FarsiArticle::find($id);
        File::delete($article->image);
        $article->delete();
        return redirect()->back()->with("success", "مقاله شما با موفقیت حذف شد");
    }

    public function destroyenglish($id)
    {
        // destroy english articles
        $article = EnglishArticle::find($id);
        File::delete($article->image);
        $article->delete();
        return redirect()->back()->with("success", "مقاله شما با موفقیت حذف شد");
    }
}
