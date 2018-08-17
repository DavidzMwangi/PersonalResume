<?php

namespace App\Http\Controllers\Backend;

use App\Models\TechnicalSkill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechnicalSkillController extends Controller
{
    //
    public function index()
    {
        return view('backend.technical_skills');
    }

    public function saveTechnicalSkill(Request $request)
    {
        $this->validate($request,[
            'skill_name'=>'required',
            'index'=>'required|numeric'
        ]);

        $data=new TechnicalSkill();
        $data->skill_name=$request->input('skill_name');
        $data->index=$request->input('index');
        $data->save();


       $this->technicalSkillsBasics();
    }

    public function technicalSkillsBasics()
    {
        return response()->json([
            'technical_skills'=>TechnicalSkill::all()
        ]);
    }
}
