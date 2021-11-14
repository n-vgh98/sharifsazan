<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CreateArticleRequest;
use App\Models\Article;
use App\Models\EnglishArticle;
use App\Models\FarsiArticle;
use App\Models\Image;

class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view("admin.articles.index", compact("articles"));
    }

    public function indexfarsi()
    {
        $articles = Article::where("language", 0)->get();
        return view("admin.articles.index", compact("articles"));
    }

    public function indexenglish()
    {
        $articles = Article::where("language", 1)->get();
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
        $category = ArticleCategory::find($request->category_id)->first();
        $article = new Article();
        $article->title = $request->title;
        $article->language = $request->language;
        $article->category_id = $request->category_id;
        $article->text = $request->text;
        $imagename = time() . "." . $request->image->extension();
        $filename = $article->title . "." . $category->id;
        $request->image->move(public_path("photos/articles/$category->title/$filename/"), $imagename);
        $article->save();

        // saving image in image table
        $image = new Image();
        $image->name = $request->image_name;
        $image->alt = $request->alt;
        $image->uploader_id = auth()->user()->id;
        $image->path = "photos/articles/$category->title/$filename/$imagename";
        $article->images()->save($image);
        // saving image in image table

        return redirect()->route("admin.articles.index")->with("success", "مقاله شما با موفقیت ساخته شد");
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
        $article = Article::find($id);
        $categories = ArticleCategory::all();
        return view("admin.articles.edit", compact("article", "categories"));
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
        $article =  Article::find($id);
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->text = $request->text;
        $article->save();
        return redirect()->route("admin.articles.index")->with("success", "مقاله شما با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        File::delete($article->images[0]->path);
        $article->delete();
        return redirect()->back()->with("success", "مقاله شما با موفقیت حذف شد");
    }
}
