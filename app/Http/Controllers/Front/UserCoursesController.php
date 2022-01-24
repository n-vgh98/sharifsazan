<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class UserCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lang = substr($request->getPathInfo(), 1, 2);
        $languages = Lang::where([["langable_type", "App\Models\Course"], ["name", $lang]])->get();
        $decoration = null;
        $settings = Lang::where([["langable_type", "App\Models\PageDecoration"], ["name", $lang]])->get();
        foreach ($settings as $setting) {
            if ($setting->langable->page_name == "courses" or $setting->langable->page_name == "course") {
                $decoration = $setting->langable;
            }
        }
        return view("user.courses.all", compact("languages", "decoration"));
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
    public function search(Request $request)
    {
        $lang = substr($request->getPathInfo(), 1, 2);
        $languages = Lang::where([["langable_type", "App\Models\Course"], ["name", $lang]])->get();

        $unfilterdcourses = [];
        $filterdcourses = [];
        $filteredcourses = [];
        $checkfilter = [];
        // gets all courses
        foreach ($languages as $language) {
            array_push($unfilterdcourses, $language->langable);
        }

        // filtering online courses
        if ($request->online) {
            // in too safe bad neshoon mide chia entekhab shodan
            array_push($checkfilter, "online");
            if (count($filterdcourses) != 0) {
                foreach ($filterdcourses as $refilteredcourse) {
                    if ($refilteredcourse->mode == 1) {
                        array_push($filteredcourses, $refilteredcourse);
                    }
                }
            } else {
                foreach ($unfilterdcourses as $unfilterdcourse) {
                    if ($unfilterdcourse->mode == 1) {
                        array_push($filteredcourses, $unfilterdcourse);
                    }
                }
            }
        }

        // filtering offline courses
        elseif ($request->offline) {
            array_push($checkfilter, "offline");

            if (count($filterdcourses) != 0) {
                foreach ($filterdcourses as $refilteredcourse) {
                    if ($refilteredcourse->mode == 0) {
                        array_push($filteredcourses, $refilteredcourse);
                    }
                }
            } else {
                foreach ($unfilterdcourses as $unfilterdcourse) {
                    if ($unfilterdcourse->mode == 0) {
                        array_push($filteredcourses, $unfilterdcourse);
                    }
                }
            }
        }

        // filtering free courses
        elseif ($request->free) {
            array_push($checkfilter, "free");
            if (count($filterdcourses) != 0) {
                foreach ($filterdcourses as $refilteredcourse) {
                    if ($refilteredcourse->price == 0) {
                        array_push($filteredcourses, $refilteredcourse);
                    }
                }
            } else {
                foreach ($unfilterdcourses as $unfilterdcourse) {
                    if ($unfilterdcourse->price == 0) {
                        array_push($filteredcourses, $unfilterdcourse);
                    }
                }
            }
        } else {
            return redirect()->route("front.courses.all")->with("fail", __("translation.filter-error"));
        }
        $decoration = null;
        $settings = Lang::where([["langable_type", "App\Models\PageDecoration"], ["name", $lang]])->get();
        foreach ($settings as $setting) {
            if ($setting->langable->page_name == "courses" or $setting->langable->page_name == "course") {
                $decoration = $setting->langable;
            }
        }
        return view("user.courses.filtered", compact("filteredcourses", "checkfilter", "decoration"));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lang, $id)
    {
        $course = Course::find($id);
        $comments = Comment::where([["status", 1], ["commentable_id", $id], ["parent_id", null], ["commentable_type", "App\Models\Course"]])->get();
        return view("user.courses.show", compact("course", "comments"));
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
