<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfessionalSkillController extends Controller
{
    //
    public function index()
    {
        return view('backend.professional_skills');
    }
}
