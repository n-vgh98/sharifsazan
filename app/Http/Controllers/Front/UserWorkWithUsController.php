<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\InviteCategory;
use Illuminate\Http\Request;

class UserWorkWithUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show($lang, $id)
    {
        $page = [];

        $category = InviteCategory::findorfail($id);
        foreach ($category->pages as $allpages) {
            if ($allpages->title == 3) {
                array_push($page, $allpages);
            }
        }
        // inverrt to collection
        if (count($page) != 0) {
            $page = $page[0];
        } else {
            return redirect()->back()->with("fail", "صفحه مورد نظر پیدا نشد");
        }
        return view("user.work_with_us.index", compact("page"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sabtename($lang, $id)
    {
        $page = [];

        $category = InviteCategory::findorfail($id);
        foreach ($category->pages as $allpages) {
            if ($allpages->title == 0) {
                array_push($page, $allpages);
            }
        }
        // inverrt to collection
        if (count($page) != 0) {
            $page = $page[0];
        } else {
            return redirect()->back()->with("fail", "صفحه مورد نظر پیدا نشد");
        }
        return view("user.work_with_us.sabtename", compact("page"));
    }



    public function fani($lang, $id)
    {
        $page = [];

        $category = InviteCategory::findorfail($id);
        foreach ($category->pages as $allpages) {
            if ($allpages->title == 1) {
                array_push($page, $allpages);
            }
        }
        // inverrt to collection
        if (count($page) != 0) {
            $page = $page[0];
        } else {
            return redirect()->back()->with("fail", "صفحه مورد نظر پیدا نشد");
        }
        return view("user.work_with_us.fani", compact("page"));
    }

    public function amali($lang, $id)
    {
        $page = [];

        $category = InviteCategory::findorfail($id);
        foreach ($category->pages as $allpages) {
            if ($allpages->title == 2) {
                array_push($page, $allpages);
            }
        }
        // inverrt to collection
        if (count($page) != 0) {
            $page = $page[0];
        } else {
            return redirect()->back()->with("fail", "صفحه مورد نظر پیدا نشد");
        }
        return view("user.work_with_us.fani", compact("page"));
    }

    public function karname()
    {
        $user = auth()->user();
        $karname = $user->karname;
        return view("user.work_with_us.karname", compact("karname"));
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
