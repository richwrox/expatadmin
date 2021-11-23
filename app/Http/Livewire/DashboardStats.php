<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LabRequest;
use App\Models\Bill;

class DashboardStats extends Component
{
    public function render()
    {
    	$numberOfLabs = $this->labRequestWithCount();
    	$outStandingLabBill = $this->labRequestWithBill();
        return view('livewire.dashboard-stats',['numberOfLabs'=>$numberOfLabs,'outStandingLabBill'=>$outStandingLabBill]);
    }

    public function labRequestWithCount(){
	    $labCount = LabRequest::where('partner_token','=',\Session::get('partnerToken'))->count();
	    return $labCount;
    }

    public function labRequestWithBill() {
	    $bill = Bill::where('partner_token','=',\Session::get('partnerToken'))->where('bill_type','lab')->first();
	    if(count($bill) > 0){
	    	return $bill->amount;
	    }else{
	    	return 0.00
	    }
	    
    }
}
