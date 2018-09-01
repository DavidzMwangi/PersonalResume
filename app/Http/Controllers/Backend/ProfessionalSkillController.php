<?php

namespace App\Http\Controllers\Backend;

use App\Models\ProfessionalSkill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfessionalSkillController extends Controller
{
    //
    public function __invoke()
    {
        return view('backend.professional_skills');
    }
    public function allSkills()
    {
        return response()->json([
            'records'=>ProfessionalSkill::all()
        ]);
    }
    public function saveData(Request $request)
    {
        $this->validate($request,[
            'skill_name'=>'required',
            'description'=>'required',
            'start_date'=>'required',
            'end_date'=>'required'
        ]);

        $data=new ProfessionalSkill();
        $data->skill_name=$request->input('skill_name');
        $data->description=$request->input('description');
        $data->start_date=$request->input('start_date');
        $data->end_date=$request->input('end_date');
        $data->save();

        return response()->json([
            'professional_skills'=>ProfessionalSkill::all()
        ]);
    }

    public function delete($id)
    {
        ProfessionalSkill::find($id)->delete();
        return response()->json([
            'success'=>true
        ]);
    }

}
