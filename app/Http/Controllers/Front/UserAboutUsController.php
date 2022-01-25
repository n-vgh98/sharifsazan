<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAboutUsController extends Controller
{
    public function index($lang)
    {
        $about_us = Lang::where([["langable_type", "App\Models\OurTeam"], ["name", $lang]])->first();
        $team_member = Lang::where([["langable_type", "App\Models\TeamMember"], ["name", $lang]])->get();
        return view('user.about_us',compact(['about_us','team_member']));
    }
}
