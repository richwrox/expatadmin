<?php
// Copyright (c) Microsoft Corporation.
// Licensed under the MIT License.

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LabRequest;
use App\Models\LoanMaster;
use App\Mail\Welcome;
use Mail;

class HomeController extends Controller
{
  public function welcome()
  {
    //$viewData = $this->loadViewData();

    return view('welcome');
  }

  public function farmer()
  {
    $viewData      = $this->loadViewData();
    $token         = session()->get('token');
    $loan          = LoanMaster::where('customer_token',$token)->where('status',NULL)->sum('loan_amount');
    return view('farmers.farmer_dashboard', $viewData,['d'=>$loan]);
  }

 
  public function seller()
  {
    $viewData     = $this->loadViewData();

    return view('sellers.seller_dashboard', $viewData);
  }

  public function buyer()
  {
    $viewData     = $this->loadViewData();

    return view('buyer.buyer_dashboard', $viewData);
  }

  public function admin()
  {
    $viewData     = $this->loadViewData();
    return view('admin.admin_dashboard', $viewData);
  }

  public function purchases(){
    $viewData     = $this->loadViewData();
    return view('admin.view_purchases', $viewData);
  }

  public function testmail(){
    $myEmail = 'arhinr@gmail.com';
   
        $details = [
            'title' => 'Mail Demo from ItSolutionStuff.com',
            'url' => 'https://www.itsolutionstuff.com'
        ];
  
        Mail::to($myEmail)->send(new Welcome($details));
        echo "Here";
   
  }

  

}