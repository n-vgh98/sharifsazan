<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CourseCreateRequest;

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
        return view("admin.courses.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new Course();
        $course->title = $request->title;
        $course->price = $request->price;
        $course->master_name = $request->master_name;
        $course->master_job = $request->master_job;
        if ($request->link !== null) {
            $course->link = $request->link;
        }
        $course->introduction_v_link = $request->introduction_v_link;
        if ($request->off > 0) {
            $course->off = $request->off;
        }
        $course->type = $request->type;
        $course->mode = $request->mode;
        $course->introduction = $request->introduction;
        $course->description = $request->description;
        $course->licensable = $request->licensable;
        $course->save();

        // saving image in image table
        $image = new Image();
        $imagename = time() . "." . $request->image->extension();
        $filename = $course->title . "." . $course->id;
        $request->image->move(public_path("photos/courses/$filename/"), $imagename);
        $image->name = $request->image_name;
        $image->alt = $request->alt;
        $image->uploader_id = auth()->user()->id;
        $image->path = "photos/courses/$filename/$imagename";
        $course->images()->save($image);
        // saving image in image table
        return redirect()->route("admin.courses.all")->with("success", ".دوره شما با موفقیت ساخته شد");
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
        $course = Course::find($id);
        return view("admin.courses.edit", compact("course"));
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
        $course = Course::find($id);
        $course->title = $request->title;
        $course->price = $request->price;
        $course->master_name = $request->master_name;
        $course->master_job = $request->master_job;
        if ($request->link !== null) {
            $course->link = $request->link;
        }
        $course->introduction_v_link = $request->introduction_v_link;
        if ($request->off > 0) {
            $course->off = $request->off;
        }
        $course->type = $request->type;
        $course->mode = $request->mode;
        $course->introduction = $request->introduction;
        $course->description = $request->description;
        $course->licensable = $request->licensable;
        $course->save();
        return redirect()->route("admin.courses.all")->with("success", ".دوره شما با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $course = Course::find($id);
        foreach ($course->images as $image) {
            File::delete($image->path);
        }
        $course->images()->delete();
        $course->delete();
        return redirect()->back()->with("success", ".دوره شما با موفقیت حذف شد");
    }
}
