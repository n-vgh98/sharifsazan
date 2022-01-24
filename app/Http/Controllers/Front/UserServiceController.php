<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;

class UserServiceController extends Controller
{
    public function index($lang,$slug)
    {
        $languages = Lang::where([["langable_type","App\Models\Service"],["name",$lang]])->first();
        $service = Service::where('slug',$slug)->first();
        return view('user.services',compact(['languages','service']));
    }
}
