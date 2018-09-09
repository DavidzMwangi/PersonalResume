<?php

namespace App\Http\Controllers\Backend;

use App\Models\Interest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InterestController extends Controller
{

    public function __invoke()
    {
        return view('backend.interest');
    }

    public function saveInterest(Request $request)
    {
        $this->validate($request,[
            'interest_name'=>'required',
            'rating'=>'required|numeric'
        ]);

        $interest=new Interest();
        $interest->name=$request->input('interest_name');
        $interest->rating=$request->input('rating');
        $interest->save();

        return response()->json([
            'interests'=>Interest::all()
        ]);
    }

    public function allInterest()
    {
        return response()->json([
           'all_data'=> Interest::all()
        ]);
    }

    public function deleteInterest(Request $request)
    {
        $this->validate($request,[
            'id'=>'required'
        ]);

        Interest::find($request->input('id'))->delete();

      return response()->json([
          'all_data'=>Interest::all()
      ]);
    }
}
