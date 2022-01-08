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
use App\Models\Lang;

class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function all()
    {
        $articles = Article::all();
        // it show that if we can make new article in this page
        $makeable = 0;
        return view("admin.articles.index", compact("articles", "makeable"));
    }

    public function english()
    {
        $languages = Lang::where([["name", "en"], ["langable_type", "App\Models\ArticleCategory"]])->get();
        $articles = [];
        foreach ($languages as $language) {
            // making collection to array
            foreach ($language->langable->articles as $articless) {
                array_push($articles, $articless);
            }
        }
        // this show what category languages should be
        $makeable = "en";
        return view("admin.articles.index", compact("articles", "makeable"));
    }

    public function farsi()
    {
        $languages = Lang::where([["name", "fa"], ["langable_type", "App\Models\ArticleCategory"]])->get();
        $articles = [];
        foreach ($languages as $language) {
            // making collection to array
            foreach ($language->langable->articles as $articless) {
                array_push($articles, $articless);
            }
        }

        // this show what category languages should be
        $makeable = "fa";
        return view("admin.articles.index", compact("articles", "makeable"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        $languages = Lang::where([["name", $lang], ["langable_type", "App\Models\ArticleCategory"]])->get();
        if (count($languages) == 0) {
            return redirect()->back()->with("fail", "لطفا ابتدا یک دسته بندی برای مقاله های زبان مورد نظر بسازید ");
        } else {
            return view("admin.articles.create", compact("languages", "lang"));
        }
        return redirect()->back()->with("fail", "مشکلی وجود دارد لطفا با تیم پشتیبانی تماس بگیرید");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticleRequest $request)
    {

        $category = ArticleCategory::find($request->category_id);
        $article = new Article();
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->text = $request->text;
        $article->meta_key_words = $request->meta_key_words;
        $article->meta_descriptions = $request->meta_descriptions;
        $article->save();
        // saving image in image table
        $image = new Image();
        $imagename = time() . "." . $request->image->extension();
        $filename = $article->title . "." . $category->id;
        $request->image->move(public_path("photos/articles/$category->title/$filename/"), $imagename);
        $image->name = $request->image_name;
        $image->alt = $request->alt;
        $image->uploader_id = auth()->user()->id;
        $image->path = "photos/articles/$category->title/$filename/$imagename";
        $article->images()->save($image);
        // saving image in image table
        return redirect()->route("admin.articles.all")->with("success", "مقاله شما با موفقیت ساخته شد");
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
        // get categories
        $languages = Lang::where([["name", $article->category->language->name], ["langable_type", "App\Models\ArticleCategory"]])->get();
        return view("admin.articles.edit", compact("article", "languages"));
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
        // check if article is farsi
        $article =  Article::find($id);
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->meta_key_words = $request->meta_key_words;
        $article->meta_descriptions = $request->meta_descriptions;
        $article->text = $request->text;
        // update image
        if ($request->image !== null) {
            $category = ArticleCategory::find($request->category_id)->first();
            $image = Image::find($article->images[0]->id);
            File::delete($image->path);
            $imagename = time() . "." . $request->image->extension();
            $filename = $article->title . "." . $category->id;
            $request->image->move(public_path("photos/articles/$category->title/$filename/"), $imagename);
            $image->name = $request->image_name;
            $image->alt = $request->alt;
            $image->uploader_id = auth()->user()->id;
            $image->path = "photos/articles/$category->title/$filename/$imagename";
            $article->images()->save($image);
        }

        $article->save();
        return redirect()->route("admin.articles.all")->with("success", "مقاله شما با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $article = Article::find($id);
        File::delete($article->images[0]->path);
        $path = pathinfo($article->images[0]->path)["dirname"];
        rmdir($path);
        $article->images()->delete();
        $article->delete();
        return redirect()->back()->with("success", "مقاله شما با موفقیت حذف شد");
    }
}
