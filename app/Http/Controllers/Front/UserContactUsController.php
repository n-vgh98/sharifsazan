<?php

namespace App\Http\Controllers\Front;

use App\Models\Image;
use App\Models\Contact_Us;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("user.contact_us");
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
        $contact_us = new Contact_Us();
        $contact_us->name = $request->name;
        $contact_us->email = $request->email;
        $contact_us->text = $request->text;
        // saving file
        if ($request->file !== null) {
            $imagename = time() . "." . $request->file->extension();
            $request->file->move(public_path("photos/files/"), $imagename);
            $contact_us->file_path = "photos/files/$imagename";
        }
        $contact_us->save();
        return redirect()->back()->with("success", __("translation.contact-done"));
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
