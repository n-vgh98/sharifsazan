<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("user.userPanel");
    }



    public function updatePassword(Request $request)
    {

        if ($request->password == $request->password_confirmation) {
            $user = User::findorfail(auth()->user()->id);
            $user->password = Hash::make($request->passowrd);
            $user->save();
            return redirect()->back()->with("success", (__("translation.password-change-confirm")));
        }
    }


    public function updateInformation(Request $request)
    {
        if (Auth::check()) {
            $user = User::findorfail(auth()->user()->id);
            if ($request->name != null) {
                $user->name = $request->name;
            }
            if ($request->email != null) {
                $user->email = $request->email;
            }
            if ($request->phone != null) {
                $user->phone = $request->phone;
            }
            if ($request->sex != null) {
                $user->gender = $request->sex;
            }
            $user->save();
            return redirect()->back()->with("success", __("translation.detail-change-confirm"));
        } else {
            return redirect()->back()->with("fail", __("translation.detail-change-confirm"));
        }
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
