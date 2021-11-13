<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Models\Notifications;
use Illuminate\Http\Request;

class AdminNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // show all public
    public function public()
    {
        $notifications = Notifications::where("mode", 1)->get();
        return view("admin.notifications.public", compact("notifications"));
    }


    // show all private
    public function private()
    {
        $notifications = Notifications::where("mode", 0)->get();
        return view("admin.notifications.private", compact("notifications"));
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
    public function store(NotificationRequest $request, $userid)
    {
        $notification = new Notifications();
        $notification->text = $request->text;
        $notification->link = $request->link;
        $notification->mode = $request->mode;
        $notification->user_id = $userid;
        $notification->save();
        return redirect()->back()->with("success", ".پیام شما با موفقیت ارسال شد");
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
        $notification = Notifications::find($id);
        $notification->delete();
        return redirect()->back()->with("success", ".پیام شما با موفقیت حذف شد");
    }


    public function statusupdate($id)
    {
        $notification = Notifications::find($id);
        if ($notification->status == 1) {
            $notification->status = 0;
            $notification->save();
            return redirect()->back()->with("success", ". وضعیت پیام شما با موفقیت به عدم نمایش تغیر داده شد");
        }
        if ($notification->status == 0) {
            $notification->status = 1;
            $notification->save();
            return redirect()->back()->with("success", ".وضعیت پیام شما با موفقیت به در حال نمایش تغیر داده شد");
        }
    }
}
