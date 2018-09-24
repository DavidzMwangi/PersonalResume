<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //

    public function __invoke()
    {
        return view('backend/profile');
    }

    public function changePassword(Request $request)
    {
       $validator= Validator::make($request->all(),[
             'password'=>'required|confirmed'
        ]);

       if ($validator->fails()){
           return back()->withErrors($validator)->withInput();
       }

       $auth=Auth::user();
       $auth->password=bcrypt($request->input('password'));
       $auth->save();

       return redirect()->back()->withErrors(['success_password'=>'Password Successfully changed']);
    }

    public function updateBasicData(Request $request)
    {

        $this->validate($request,[
            'email'=>'required',
            'name'=>'required',
        ]);

        $user=Auth::user();
        $user->email=$request->input('email');
        $user->name=$request->input('name');
        $user->save();


        return response()->json([
            'user'=>Auth::user()
        ]);
    }

    public function updateOtherForm(Request $request)
    {
        $this->validate($request,[
            'phone_number_1'=>'required',
            'phone_number_2'=>'required',
            'website'=>'required',
            'email_2'=>'required',
        ]);

        $user=Auth::user();
        $user->phone_number_1=$request->input('phone_number_1');
        $user->phone_number_2=$request->input('phone_number_2');
        $user->website=$request->input('website');
        $user->email_2=$request->input('email_2');
        $user->save();

        return response()->json([
            'user'=>Auth::user()
        ]);
    }
}
