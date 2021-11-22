<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\leaveType;
use App\Models\LeaveBalance;
use App\Models\RequestLeave;
use App\Http\Controllers\LeaveController;
use App\Core\GlobalService;

class RequestNewLeave extends Component
{
	use GlobalService;

	public $leaveType;
	public $startDate;
	public $endDate;
	public $submitTo;
	public $handingOverNote;
	public $comment;
	public $myLeaveBalance;

	protected $listeners = ['request_successful' => 'render'];

	public function mount(){
		
	}

    public function render()
    {
    	$leaveTypes = leaveType::get();
    	$this->myLeaveBalance = LeaveController::getLeaveBalance();
        return view('livewire.request-new-leave',compact('leaveTypes'));
    }

    public function createRequest(){
    	$rules = [
	  	'leaveType'=>'required',
	  	'startDate'=>'required',
	  	'endDate'=>'required',
	  	'submitTo'=>'required',
	  	//'handingOverNote'=>'required',
        //'comment'=>'required'
	  ];
	  $messages =[
	  	'leaveType.required' => 'Select leave type',
	  	'startDate.required'=>'Provide start date',
	  	'endDate.required'=>'Provide  end date',
	  	'submitTo.required'=>'Select manager',
	  	//'handingOverNote.required'=>'Add your handing over note',
        
	  ];

	  $this->validate($rules,$messages);

	  $userId = Session::get('id');
	  $email  = Session::get('userEmail');

	  $LeaveController= new LeaveController();
	  
	  $fmtStartDate   = $this->formatCustomDate($this->startDate);
	  $fmtEndDate     = $this->formatCustomDate($this->endDate);
	  $leaveDuration  = (abs(strtotime($fmtEndDate) - strtotime($fmtStartDate)) / (60 * 60 * 24));
	 
      $leaveDays      = $this->getWorkingDays($this->startDate,$this->endDate);
	 
	  $fetchBalance = $LeaveController->validateLeaveRequest($leaveDays);
      
      if($fetchBalance['balanceStatus'] === 'Insufficient'){
      	$this->myLeaveBalance = $fetchBalance['balanceAmount'];
      	$this->emit('balance_insufficient');
      	return false;
      }

	  //Check if Quota has been assigned for the current vacation year
	  if(LeaveBalance::where('emp_id', $userId)->where('email',$email)->exists()){
	    //Insert roaster and update balance 
	    try{
	    	\DB::transaction(function () use ($userId,$email,$LeaveController,$leaveDays) {
			   
		  	  $LeaveController->postLeaveRequest($this->leaveType,$this->startDate,$this->endDate,$email,$this->submitTo,$leaveDays);
		  	  $LeaveController->updateLeaveBalance($leaveDays);
			});
			$this->myLeaveBalance = $fetchBalance['balanceAmount'];
			$this->emit('request_successful');
	    }catch(\Exception $e){
	    	$this->emit('error');
	    }
	   

	  }else{
		  	
		  	try{
		  		//Create new quota and insert roaster	
		  	  \DB::transaction(function () use ($userId,$email,$LeaveController,$leaveDays) {
				  $LeaveController->addLeaveQuota($userId,$email,$leaveDays);  
			  	  $LeaveController->postLeaveRequest($this->leaveType,$this->startDate,$this->endDate,$email,$this->submitTo,$leaveDays);
			  	 
				});
		  	  $this->emit('request_successful');
		  	}catch(\Exception $e){
		  		//dd("Quota does not exist");
		  		$this->emit('error');	
		  	}
	   

	  }//
    
    }

    



}
