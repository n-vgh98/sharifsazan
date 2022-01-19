<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use App\Models\ShoppingList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminShoppingListController extends Controller
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
        $orders = ShoppingList::where([["user_id", auth()->user()->id]])->get();
        return view("user.courses.shoppinglist", compact("orders", "languages"));
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

    public function add($lang, $id)
    {
        $order = new ShoppingList();
        $order->user_id = auth()->user()->id;
        $order->course_id = $id;
        $order->save();
        return redirect()->back()->with("success", "دوره مورد نظر شما با موفقیت به سبد خرید شما اضافه شد.");
    }
}
