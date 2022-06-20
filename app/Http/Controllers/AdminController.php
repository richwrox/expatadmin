<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
    public function index(Request $request){
    	//List all admin users
    	$users = User::where('type',1)->get();
    	return view('admin.all_users',compact('users'));
    }
}
