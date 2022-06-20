<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PersonalInfo;

class ApplicantController extends Controller
{
    public function index(){
    	$users = User::where('type',1)->get();
    	$applicants = PersonalInfo::get();
    	
    	return view('applicants.index',compact('users','applicants'));
    }
}
