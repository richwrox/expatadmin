<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilingController extends Controller
{
    public function index(Request $request){
        return view('applicants.view_filings');
    }
}
