<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karname;
use Illuminate\Http\Request;

class AdminKarnameController extends Controller
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
        $karname = new Karname();
        $karname->user_id = $request->id;
        $karname->fani = $request->fani;
        $karname->amali = $request->amali;
        $karname->final = $request->final;
        $karname->status = $request->status;
        $karname->save();
        return redirect()->back()->with("success", "کارنامه با موفقیت برای فرد مورد نظر ثبت شد");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $karname = Karname::find($id);
        $karname->fani = $request->fani;
        $karname->amali = $request->amali;
        $karname->final = $request->final;
        $karname->status = $request->status;
        $karname->save();
        return redirect()->back()->with("success", "کارنامه با موفقیت برای فرد مورد نظر ویرایش شد");
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
