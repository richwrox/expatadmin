<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TokenStore\TokenCache;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Core\MakesApiRequest;



class UserManagementController extends Controller
{
    public function index(){
    	$viewData     = $this->loadViewData();
    	return view('admin.user_profile',$viewData);
    }

    public function showAllUsers(){
    	return view('admin.user_list');
    }

    public function editDetails($token){
    	return view('admin.edit_user_details');
    }

    public function viewUsersByGroup(){
        return view('admin.viewusers_by_groups');
    }

}
