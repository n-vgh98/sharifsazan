<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view("admin.comments.index", compact("comments"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = Course::find($request->course_id);
        $comment = new Comment();
        $comment->text = $request->text;
        $comment->status = 0;
        $comment->user_id = auth()->user()->id;
        $course->comments()->save($comment);
        return redirect()->back()->with("success", __("translation.commentconfirmation"));
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
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back()->with("success", "پیام مورد نظر حذف شد");
    }

    public function accept($id)
    {
        $comment = Comment::find($id);
        $comment->status = 1;
        $comment->save();
        return redirect()->back()->with("success", "پیام مورد نظر به حالت تایید شده تغیر کرد");
    }

    public function decline($id)
    {
        $comment = Comment::find($id);
        $comment->status = 0;
        $comment->save();
        return redirect()->back()->with("success", "پیام مورد نظر دیگر نمایش داده نمیشود");
    }
}
