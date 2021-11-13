<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  for showing all courses
    public function all()
    {
        $courses = Course::all();
        return view("admin.courses.all", compact("courses"));
    }

    //  for showing online courses
    public function online()
    {
        $courses = Course::where("mode", 1)->get();
        return view("admin.courses.online", compact("courses"));
    }

    //  for showing offline courses
    public function offline()
    {
        $courses = Course::where("mode", 0)->get();
        return view("admin.courses.offline", compact("courses"));
    }

    //  for showing free courses
    public function free()
    {
        $courses = Course::where("price", 0)->get();
        return view("admin.courses.free", compact("courses"));
    }

    //  for showing not_free courses
    public function notfree()
    {
        $courses = Course::where("price", ">", 0)->get();
        return view("admin.courses.notfree", compact("courses"));
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
        //
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
        //
    }
}
