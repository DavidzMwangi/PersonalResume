<?php

namespace App\Http\Controllers\Backend;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    //
    public function __invoke()
    {
        return view('backend.projects')->withProjects(Project::all());
    }

    public function saveProject(Request $request)
    {

//        return json_encode("ffdf");
        $this->validate($request,[
            'project_name'=>'required',
            'project_duration'=>'required',
            'project_completion_date'=>'required',
            'project_year'=>'required',
        ]);



        $projo=new Project();
        $projo->project_name=$request->input('project_name');
        $projo->project_duration=$request->input('project_duration');
        $projo->project_completion_date=$request->input('project_completion_date');

        if ($request->input('maintaining_it')==1){
            $projo->maintaining_it=$request->input('maintaining_it');
        }else{
            $projo->maintaining_it=false;
        }

        $projo->project_year=$request->input('project_year');
        $projo->save();



        /*
         * $table->string('project_name');
            $table->integer('project_duration'); //in months
            $table->date('project_completion_date');
            $table->boolean('maintaining_it');
            $table->year('project_year');
         */

        return response()->json([

        ]);
    }
}
