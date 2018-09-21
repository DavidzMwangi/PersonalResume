<?php

namespace App\Http\Controllers\Backend;

use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    //
    public function __invoke()
    {

        return view('backend.experience')->withExperiences(Experience::all());
    }

    public function saveExperience(Request $request)
    {
        $this->validate($request,[
            'start_date'=>'required',
            'end_date'=>'required',
            'description'=>'required',
            'company'=>'required',
            'company_email'=>'required',
            'company_website'=>'required'
        ]);

        $ex=new Experience();
        $ex->start_date=$request->input('start_date');
        $ex->end_date=$request->input('end_date');
        $ex->description=$request->input('description');
        $ex->company=$request->input('company');
        $ex->company_email=$request->input('company_email');
        $ex->company_website=$request->input('company_website');
        $ex->save();


        return response()->json([
            'success'=>true
        ]);
    }
}
