<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectGallery;

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

    public function show($lang,$name)
    {
        $languages = Lang::where([["langable_type","App\Models\Project"],["name",$lang]])->first();
        $project = Project::where('name',$name)->first();
        $project_photo = ProjectGallery::where('project_id',$project->id)->get();
        return view('user.projects.show',compact(['languages','project','project_photo']));
    }
}
