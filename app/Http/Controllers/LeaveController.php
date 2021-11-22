<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\LeaveType;
use App\Models\LeaveBalance;
use App\Models\RequestLeave;
use Session;

class LeaveController extends Controller
{
     public function index()
	  {
	    $viewData = $this->loadViewData();

	    return view('employees.request_new_leave', $viewData);
	  }

	  public function addLeaveQuota($id,$email,$currentLeaveDays){
	  	$balance     = new LeaveBalance;
	  	$vacYear     = date('Y');
	  	$nowWithTime = date('Y-m-d H:i:s');

        $balance->emp_id        = $id;
        $balance->vacation_year = $vacYear;
        $balance->balance       = 25 - $currentLeaveDays;
        $balance->email         = $email;
        $balance->created_at    = $nowWithTime;

        $balance->save();
	  }

	  public function postLeaveRequest($leaveTypeId,$startDate,$endDate,$requester,$approver,$leaveDays){
	  	$leave = new RequestLeave;
	  	$vacYear = date('Y');
	  	$nowWithTime = date('Y-m-d H:i:s');

	  	$leave->vac_year      = $vacYear;
	  	$leave->leave_type_id = $leaveTypeId;
	  	$leave->start_date    = $startDate;
	  	$leave->end_date      = $endDate;
	  	$leave->requester     = $requester;
	  	$leave->approver      = $approver;
	  	$leave->status        = 'pending';
	  	$leave->created_at    = $nowWithTime;
	  	$leave->leave_days    = $leaveDays;

	  	$leave->save();

	  }


	  public function updateLeaveBalance($leaveDays){
	  	$empId     = Session::get('id');
	  	$balance   = LeaveBalance::where('emp_id',$empId);
	  	
		  	//try{
		  		$balance->decrement('balance',$leaveDays);
	            
		  	//}catch(\Exception $e){

		  	//}
	  	
	  }

	  public function validateLeaveRequest($leaveDays){
	  	$empId     = Session::get('id');
	  	$leaveBalance = LeaveBalance::where('emp_id', $empId)->first();

	  	if($leaveDays > $leaveBalance->balance){
           $status = ['balanceStatus'=>'Insufficient','balanceAmount'=>$leaveBalance->balance];
	  	}else{
	  	   $status = ['balanceStatus'=>'Sufficient','balanceAmount'=>$leaveBalance->balance];	
	  	}
		return $status;
	  }

	  public static function getLeaveBalance(){
	  	$empId     = Session::get('id');
	  	$leaveBalance = LeaveBalance::where('emp_id', $empId)->first();
	  	return $leaveBalance->balance;
	  }


}
