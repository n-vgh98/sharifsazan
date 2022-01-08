<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CreateArticleRequest;
use App\Models\Article;
use App\Models\EnglishArticle;
use App\Models\EnglishArticleCategory;
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
        return view("admin.articles.index", compact("articles"));
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
        return view("admin.articles.index", compact("articles"));
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
        return view("admin.articles.index", compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        // check if article is for farsi users
        $category = ArticleCategory::findorfail($id);
        dd($category);
        return view("admin.articles.create", compact("category", "id"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticleRequest $request)
    {

        // if article is for farsi users
        if ($request->lang == 0) {
            $category = ArticleCategory::find($request->category_id)->first();
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

            return redirect()->route("admin.articles.farsi.index")->with("success", "مقاله شما با موفقیت ساخته شد");
        }

        // if article is for english users
        if ($request->lang == 1) {
            $category = EnglishArticleCategory::find($request->category_id)->first();
            $article = new EnglishArticle();
            $article->title = $request->title;
            $article->category_id = $category->id;
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

            return redirect()->route("admin.articles.english.index")->with("success", "مقاله شما با موفقیت ساخته شد");
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
    public function edit($id, $lang)
    {
        if ($lang == 0) {
            $article = Article::find($id);
            $categories = ArticleCategory::all();
            return view("admin.articles.edit", compact("article", "categories", "lang"));
        }

        if ($lang == 1) {
            $article = EnglishArticle::find($id);
            $categories = EnglishArticleCategory::all();
            return view("admin.articles.edit", compact("article", "categories", "lang"));
        }
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
        if ($request->lang == 0) {
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
            return redirect()->route("admin.articles.farsi.index")->with("success", "مقاله شما با موفقیت ویرایش شد");
        }

        // check if article is english
        if ($request->lang == 1) {
            $article =  EnglishArticle::find($id);
            $article->title = $request->title;
            $article->category_id = $request->category_id;
            $article->meta_key_words = $request->meta_key_words;
            $article->meta_descriptions = $request->meta_descriptions;
            $article->text = $request->text;
            // update image
            if ($request->image !== null) {
                $category = EnglishArticleCategory::find($request->category_id)->first();
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
            return redirect()->route("admin.articles.english.index")->with("success", "مقاله شما با موفقیت ویرایش شد");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // check if article is farsi
        if ($request->lang == 0) {
            $article = Article::find($id);
            File::delete($article->images[0]->path);
            $path = pathinfo($article->images[0]->path)["dirname"];
            rmdir($path);
            $article->images()->delete();
            $article->delete();
            return redirect()->back()->with("success", "مقاله شما با موفقیت حذف شد");
        }

        // check if article is english
        if ($request->lang == 1) {
            $article = EnglishArticle::find($id);
            File::delete($article->images[0]->path);
            $path = pathinfo($article->images[0]->path)["dirname"];
            rmdir($path);
            $article->images()->delete();
            $article->delete();
            return redirect()->back()->with("success", "مقاله شما با موفقیت حذف شد");
        }
    }
}
