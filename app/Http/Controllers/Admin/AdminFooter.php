<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class AdminFooter extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = Footer::all()->sortByDesc('updated_at')->take(1);
        return view('admin.footer.index',compact('footer'));
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
        $footer = new Footer();
        $footer->about_us = $request->input('about_us');
        $footer->address = $request->input('address');
        $footer->phone_num = $request->input('phone_num');
        $footer->mobile_num = $request->input('mobile_num');
        $footer->insta_link = $request->input('insta_link');
        $footer->mail_link = $request->input('mail_link');
        $footer->LinkedIn_link = $request->input('LinkedIn_link');
        $footer->face_link = $request->input('face_link');
        $footer->save();
        return redirect()->back()->with("success", " Footerبا موفقیت ثبت شد ");

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
        $footer = Footer::findOrFail($id);
        $footer->about_us = $request->input('about_us');
        $footer->address = $request->input('address');
        $footer->phone_num = $request->input('phone_num');
        $footer->mobile_num = $request->input('mobile_num');
        $footer->insta_link = $request->input('insta_link');
        $footer->mail_link = $request->input('mail_link');
        $footer->LinkedIn_link = $request->input('LinkedIn_link');
        $footer->face_link = $request->input('face_link');
        $footer->save();
        return redirect()->back()->with("success", " Footerبا موفقیت ویرایش شد  ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $footer = Footer::findOrFail($id);
        $footer->delete();
        return redirect()->back()->with("success", "Footer حذف شد");
    }
}
