<?php

namespace App\Http\Controllers\Writer;

use App\Models\Image;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\EnglishCourse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class WriterCourseController extends Controller
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
        $englishcourses = EnglishCourse::all();
        return view("writer.courses.all", compact("courses", "englishcourses"));
    }

    //  for showing online courses
    public function online()
    {
        $courses = Course::where("mode", 1)->get();
        $englishcourses = EnglishCourse::where("mode", 1)->get();
        return view("writer.courses.online", compact("courses", "englishcourses"));
    }

    //  for showing offline courses
    public function offline()
    {
        $courses = Course::where("mode", 0)->get();
        $englishcourses = EnglishCourse::where("mode", 0)->get();
        return view("writer.courses.offline", compact("courses", "englishcourses"));
    }

    //  for showing free courses
    public function free()
    {
        $courses = Course::where("price", 0)->get();
        $englishcourses = EnglishCourse::where("price", 0)->get();
        return view("writer.courses.free", compact("courses", "englishcourses"));
    }

    //  for showing not_free courses
    public function notfree()
    {
        $courses = Course::where("price", ">", 0)->get();
        $englishcourses = EnglishCourse::where("price", ">", 0)->get();
        return view("writer.courses.notfree", compact("courses", "englishcourses"));
    }












    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("writer.courses.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if its persian
        if ($request->lang == 0) {
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
            $course->meta_key_words = $request->meta_key_words;
            $course->meta_descriptions = $request->meta_descriptions;
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
        }

        // if its english
        if ($request->lang == 1) {
            $course = new EnglishCourse();
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
            $course->meta_key_words = $request->meta_key_words;
            $course->meta_descriptions = $request->meta_descriptions;
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
        }
        return redirect()->route("writer.courses.all")->with("success", ".دوره شما با موفقیت ساخته شد");
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
        // check if course is farsi
        if ($lang == 0) {
            $course = Course::find($id);
            return view("writer.courses.edit", compact("course", "lang"));
        }

        // check if course is english
        if ($lang == 1) {
            $course = EnglishCourse::find($id);
            return view("writer.courses.edit", compact("course", "lang"));
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

        // check if course is farsi
        if ($request->lang == 0) {
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
            $course->meta_key_words = $request->meta_key_words;
            $course->meta_descriptions = $request->meta_descriptions;
            $course->introduction = $request->introduction;
            $course->description = $request->description;
            $course->licensable = $request->licensable;
            $course->save();
            return redirect()->route("writer.courses.all")->with("success", ".دوره شما با موفقیت ویرایش شد");
        }


        // check if course is english
        if ($request->lang == 1) {
            $course = EnglishCourse::find($id);
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
            $course->meta_key_words = $request->meta_key_words;
            $course->meta_descriptions = $request->meta_descriptions;
            $course->introduction = $request->introduction;
            $course->description = $request->description;
            $course->licensable = $request->licensable;
            $course->save();
            return redirect()->route("writer.courses.all")->with("success", ".دوره شما با موفقیت ویرایش شد");
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
        // check if course in farsi
        if ($request->lang == 0) {
            $course = Course::find($id);
            $path = pathinfo($course->images[0]->path)["dirname"];
            foreach ($course->images as $image) {
                File::delete($image->path);
            }
            rmdir($path);
            $course->images()->delete();
            $course->delete();
            return redirect()->back()->with("success", ".دوره شما با موفقیت حذف شد");
        }

        // check if course in english
        if ($request->lang == 1) {
            $course = EnglishCourse::find($id);
            $path = pathinfo($course->images[0]->path)["dirname"];
            foreach ($course->images as $image) {
                File::delete($image->path);
            }
            rmdir($path);
            $course->images()->delete();
            $course->delete();
            return redirect()->back()->with("success", ".دوره شما با موفقیت حذف شد");
        }
    }
}
