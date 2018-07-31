<?php

namespace App\Http\Controllers\Backend;

use App\Models\AboutMe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutMeController extends Controller
{
    //

    public function index()
    {
        return view('backend.about_me');
    }

    public function aboutMeBasics()
    {
        $record=AboutMe::first();
        return response()->json([
            'about_me'=>$record
        ]);
    }

    public function saveRecord(Request $request)
    {
        $this->validate($request,[
            'first_name'=>'required',
            'middle_name'=>'required',
            'last_name'=>'required',
            'description'=>'required'
        ]);

        $record=AboutMe::first();
        if ($record==null){
            //first instance of the record

            $about=new AboutMe();
            $about->first_name=$request->input('first_name');
            $about->middle_name=$request->input('middle_name');
            $about->last_name=$request->input('last_name');
            $about->description=$request->input('description');
            $about->save();
        }else{
            $record->first_name=$request->input('first_name');
            $record->middle_name=$request->input('middle_name');
            $record->last_name=$request->input('last_name');
            $record->description=$request->input('description');
            $record->save();
        }

        return response()->json([
            'about'=>AboutMe::first()
        ]);
    }
}
