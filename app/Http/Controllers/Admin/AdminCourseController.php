<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
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


    //  methods for showing all courses

    //  for showing all courses
    public function all()
    {
        $languages = Lang::where("langable_type", "App\Models\Course")->get();
        return view("admin.courses.all", compact("languages"));
    }

    //  for showing all farsi courses
    public function farsi()
    {
        $languages = Lang::where([["name", "fa"], ["langable_type", "App\Models\Course"]])->get();
        return view("admin.courses.all", compact("languages"));
    }

    //  for showing all english courses
    public function english()
    {
        $languages = Lang::where([["name", "en"], ["langable_type", "App\Models\Course"]])->get();
        return view("admin.courses.all", compact("languages"));
    }

    // end of methods for showing all courses



    //  for showing online courses
    public function online()
    {
        $languages = Lang::where("langable_type", "App\Models\Course")->with("langable")->get();
        // get online courses
        $langs = [];
        foreach ($languages as $language) {
            if ($language->langable->mode == 1) {
                array_push($langs, $language);
            }
        }
        return view("admin.courses.online", compact("langs"));
    }

    public function onlineEn()
    {
        $languages = Lang::where([["langable_type", "App\Models\Course"], ["name", "en"]])->with("langable")->get();
        // get online courses
        $langs = [];
        foreach ($languages as $language) {
            if ($language->langable->mode == 1) {
                array_push($langs, $language);
            }
        }

        return view("admin.courses.online", compact("langs"));
    }

    public function onlineFa()
    {
        $languages = Lang::where([["langable_type", "App\Models\Course"], ["name", "fa"]])->with("langable")->get();
        // get online courses
        $langs = [];
        foreach ($languages as $language) {
            if ($language->langable->mode == 1) {
                array_push($langs, $language);
            }
        }

        return view("admin.courses.online", compact("langs"));
    }



    //  for showing offline courses
    public function offline()
    {
        $languages = Lang::where("langable_type", "App\Models\Course")->with("langable")->get();
        // get online courses
        $langs = [];
        foreach ($languages as $language) {
            if ($language->langable->mode == 0) {
                array_push($langs, $language);
            }
        }
        return view("admin.courses.offline", compact("langs"));
    }

    //  for showing offline courses
    public function offlineEn()
    {
        $languages = Lang::where([["langable_type", "App\Models\Course"], ["name", "en"]])->with("langable")->get();
        // get online courses
        $langs = [];
        foreach ($languages as $language) {
            if ($language->langable->mode == 0) {
                array_push($langs, $language);
            }
        }

        return view("admin.courses.offline", compact("langs"));
    }

    //  for showing offline courses
    public function offlineFa()
    {
        $languages = Lang::where([["langable_type", "App\Models\Course"], ["name", "fa"]])->with("langable")->get();
        // get online courses
        $langs = [];
        foreach ($languages as $language) {
            if ($language->langable->mode == 0) {
                array_push($langs, $language);
            }
        }

        return view("admin.courses.offline", compact("langs"));
    }







    //  for showing free courses
    public function free()
    {
        $languages = Lang::where("langable_type", "App\Models\Course")->with("langable")->get();
        // get online courses
        $langs = [];
        foreach ($languages as $language) {
            if ($language->langable->price == 0) {
                array_push($langs, $language);
            }
        }
        return view("admin.courses.free", compact("langs"));
    }

    public function freeFa()
    {
        $languages = Lang::where([["langable_type", "App\Models\Course"], ["name", "fa"]])->with("langable")->get();
        // get online courses
        $langs = [];
        foreach ($languages as $language) {
            if ($language->langable->price == 0) {
                array_push($langs, $language);
            }
        }
        return view("admin.courses.free", compact("langs"));
    }

    public function freeEn()
    {
        $languages = Lang::where([["langable_type", "App\Models\Course"], ["name", "en"]])->with("langable")->get();
        // get online courses
        $langs = [];
        foreach ($languages as $language) {
            if ($language->langable->price == 0) {
                array_push($langs, $language);
            }
        }
        return view("admin.courses.free", compact("langs"));
    }

    //  for showing not_free courses
    public function notfree()
    {
        $languages = Lang::where("langable_type", "App\Models\Course")->with("langable")->get();
        // get online courses
        $langs = [];
        foreach ($languages as $language) {
            if ($language->langable->price != 0) {
                array_push($langs, $language);
            }
        }
        return view("admin.courses.notfree", compact("langs"));
    }

    public function notfreeFa()
    {
        $languages = Lang::where([["langable_type", "App\Models\Course"], ["name", "fa"]])->with("langable")->get();
        // get online courses
        $langs = [];
        foreach ($languages as $language) {
            if ($language->langable->price != 0) {
                array_push($langs, $language);
            }
        }
        return view("admin.courses.notfree", compact("langs"));
    }

    public function notfreeEn()
    {
        $languages = Lang::where([["langable_type", "App\Models\Course"], ["name", "en"]])->with("langable")->get();
        // get online courses
        $langs = [];
        foreach ($languages as $language) {
            if ($language->langable->price != 0) {
                array_push($langs, $language);
            }
        }
        return view("admin.courses.notfree", compact("langs"));
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
        $course->meta_key_words = $request->meta_key_words;
        $course->meta_descriptions = $request->meta_descriptions;
        $course->save();
        $courselanguage = new Lang();
        $courselanguage->name = $request->lang;
        $course->language()->save($courselanguage);

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
        $course->meta_key_words = $request->meta_key_words;
        $course->meta_descriptions = $request->meta_descriptions;
        $course->introduction = $request->introduction;
        $course->description = $request->description;
        $course->licensable = $request->licensable;

        // update image
        if ($request->image !== null) {
            $image = Image::find($course->images[0]->id);
            File::delete($image->path);
            $imagename = time() . "." . $request->image->extension();
            $filename = $course->title . "." . $course->id;
            $request->image->move(public_path("photos/courses/$filename/"), $imagename);
            $image->name = $request->image_name;
            $image->alt = $request->alt;
            $image->uploader_id = auth()->user()->id;
            $image->path = "photos/courses/$filename/$imagename";
            $course->images()->save($image);
        }
        $course->save();
        return redirect()->route("admin.courses.all")->with("success", ".دوره شما با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $course = Course::find($id);
        $path = pathinfo($course->images[0]->path)["dirname"];
        foreach ($course->images as $image) {
            File::delete($image->path);
        }
        rmdir($path);
        $course->images()->delete();
        $course->language()->delete();
        $course->delete();
        return redirect()->back()->with("success", ".دوره شما با موفقیت حذف شد");
    }
}
