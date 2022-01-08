<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class AdminTeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = TeamMember::with('images')->get();
        return view('admin.ourteam.members.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = new TeamMember();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $members = new TeamMember();
        $members->name = $request->input('name');
        $members->job_title = $request->input('job_title');
        $members->education = $request->input('education');
        $members->attribute = $request->input('attribute');
        $members->admin = $request->input('admin');
        $members->mode = $request->input('mode');
        $members->save();


        return redirect()->route('members.index')->with("success", "همکار با موفقیت ثبت شد");
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
        $members = TeamMember::findOrFail($id);
        $members->name = $request->input('name');
        $members->job_title = $request->input('job_title');
        $members->education = $request->input('education');
        $members->attribute = $request->input('attribute');
        $members->admin = $request->input('admin ');
        $members->mode = $request->input('mode');
        $members->save();

        return redirect()->route('members.index')->with("success", "همکار با موفقیت ویرایش شد");
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
