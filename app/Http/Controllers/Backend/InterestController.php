<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InterestController extends Controller
{
    //
    public function __invoke()
    {
        return view('backend.interest');
    }
}
