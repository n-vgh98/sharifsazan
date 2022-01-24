<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProjectController extends Controller
{
    public function index( $lang)
    {
        $languages = Lang::where([["langable_type","App\Models\Project"],["name",$lang]])->get();
        $decoration = null;
        $settings = Lang::where([["langable_type", "App\Models\PageDecoration"], ["name", $lang]])->get();
        foreach ($settings as $setting) {
            if ($setting->langable->page_name == "projects" or $setting->langable->page_name == "project") {
                $decoration = $setting->langable;
            }
        }
        return view('user.projects.index',compact(['decoration','languages']));
    }
}
