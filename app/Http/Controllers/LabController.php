<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LabController extends Controller
{
    public function index(){
    	return view('labs.show_labs');
    }

    public function viewUserGroups(){
    	return view('labs.select_users');
    }

}

