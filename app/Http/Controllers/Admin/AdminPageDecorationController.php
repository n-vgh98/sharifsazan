<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\PageDecoration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPageDecorationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {

        // $articles = $language->articles;
        $languages = Lang::where([["langable_type", "App\Models\PageDecoration"], ["name", $lang]])->get();
        return view('admin.decoration.index', compact('languages', 'lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {

        return view('admin.decoration.create', compact('lang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new PageDecoration();
        $article->page_name = $request->input('page_name');
        $article->meta_description = $request->input('meta_description');
        $article->meta_keywords = $request->input('meta_keywords');
        $article->text = $request->input('text');
        $article->save();

        // saving article image
        $image = new Image();
        $image->name = $request->img_name;
        $image->alt = $request->alt;
        $image->uploader_id = auth()->user()->id;
        $imagename = time() . "." . $request->path->extension();
        $request->path->move(public_path("images/pagedecoration/"), $imagename);
        $image->path = "images/pagedecoration/" . $imagename;
        $article->image()->save($image);



        // saving language for article
        $language = new Lang();
        $language->name = $request->lang;
        $article->lang()->save($language);

        Session::flash('add_article', 'تنظیمات جدید با موفقیت ثبت شد');
        return redirect()->route('admin.page.decoration.index', $request->lang);
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
        $article = PageDecoration::findOrFail($id);
        return view('admin.decoration.edit', compact('article'));
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
        $article = PageDecoration::findOrFail($id);
        $article->page_name = $request->input('page_name');
        $article->meta_description = $request->input('meta_description');
        $article->meta_keywords = $request->input('meta_keywords');
        $article->text = $request->input('text');
        $article->save();
        Session::flash('add_article', 'تنظیمات با موفقیت ویرایش شد');
        return redirect()->route('admin.page.decoration.index', $article->lang->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = PageDecoration::findOrFail($id);
        unlink($article->image->path);
        $article->lang()->delete();
        $article->delete();

        Session::flash('delete_article', 'مقاله حذف شد');
        return redirect()->back();
    }

    public function updateimage(Request $request, $id)
    {
        $image = Image::find($id);
        $image->name = $request->name;
        $image->alt = $request->alt;
        if ($request->path !== null) {
            unlink($image->path);
            $imagename = time() . "." . $request->path->extension();
            $request->path->move(public_path("images/articles/"), $imagename);
            $image->path = "images/articles/" . $imagename;
        }
        $image->save();
        return redirect()->back()->with("success", "عکس مقاله  با موفقیت ویرایش شد");
    }
}
