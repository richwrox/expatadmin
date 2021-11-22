<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PartnerGroup;
use App\Models\InstitutionUser;
use App\Models\Patient;
use App\Models\LabItem;
use App\Models\Bill;
use App\Models\LabBundleItem;
use App\Core\MakesApiRequest;
use App\Core\GlobalService;
use Illuminate\Support\Facades\DB;
use App\Http\BulkAction\BulkLabRequest;


class ViewUserGroups extends Component
{
	use MakesApiRequest; use GlobalService;

	protected $listeners = ['update-user-list'=>'render','select-all-employees'=>'render','get-bill-amount'=>'calculateBillAmount'];
	public $selectedGroup=0;
	public $selectAllGroups = false;
	public $users;
	public $myGroups;
	public $packageName;
	public $packageCode;
	public $price;
	public $billAmount;
	public $checked= [];
    public $selectAll= false;
    public $testDate;
    public $timeOfTest;
    public $sampleLocation;
    public $bundleId;

    public function mount(){
    	$this->myGroups    = PartnerGroup::where('partner_token', \Session::get('partnerToken'))->get();
    	$this->packageName = \Session::get('packageName');
    	$this->packageCode = \Session::get('packageCode');
    	$this->bundleId    = \Session::get('bundleId');

    }
    public function render()
    {   
    	
    	$employees=DB::table('institution_users as i')->join('patients as p', 'i.user_token', '=', 'p.token')->select('p.first_name','p.last_name','p.email','p.token','p.patient_id','p.phone')->where('i.institution_token','=',\Session::get('partnerToken'))->where('i.group_id','=',$this->selectedGroup)->get();
    	
        return view('livewire.view-user-groups',compact('employees'));
    
    }
    
    public function getSelectedGroup($id){
    	$this->selectAllGroups = false; 
    	$this->selectAll       = false;
        $this->selectedGroup   = $id;
        $this->checked         = [];
    	$this->emit('update-user-list');
    }

    public function updatedSelectAll($value){
    	
    	if($value){
    	 	$this->checked = InstitutionUser::where('institution_token','=',\Session::get('partnerToken'))->where('group_id','=',$this->selectedGroup)->pluck('user_token');	
    	 	// dd($this->checked);
    	 }else{
    	 	$this->checked= [];
    	 }
    	 $this->emit('get-bill-amount');
    }

    public function updatedChecked(){
        $this->selectAll=false;
        $this->emit('get-bill-amount');
    }

    public function bookingSummary(){
    	$data = ['packageName'=>$this->packageName,'packageCode'=>$this->packageCode,'client'=>'web',
    	'token'=>\Session::get('partnerToken'),'amount'=>$this->billAmount,'tranSactionType'=>'lab_request_bundled'];
        //$labBundleItems = $this->getBundleItems();
        //dd($labBundleItems);
        $bulkAction = new BulkLabRequest;

        $rules = [
	  	'testDate'=>'required',
	  	'timeOfTest'=>'required',
	  	'sampleLocation'=>'required',
	  	];
	  	$messages =[
	  	'testDate.required'      => 'Select a test date',
      	'timeOfTest.required'    => 'Select a slot',
      	'sampleLocation.required'=>'Where would you want us to pick the samples'
      	];
        $this->validate($rules,$messages);
        
        $response = $this->getInvoiceId($data);
        if($response->statusCode === 201){
        	$cart = $this->getBundleItems();
        	$this->addBill();
        	
        	$fmtTesetDate   = $this->formatCustomDateOnly($this->testDate);
        	$ressult = $bulkAction->bookLabs($this->checked,$fmtTesetDate,$this->timeOfTest,$this->sampleLocation,$this->packageName,$response->data->invoice_number,$this->billAmount,$cart);
        	if($ressult === 200){
        		$this->emit('submitted');
        		$this->testDate=''; $timeOfTest='';$this->sampleLocation='';
        		$this->checked=[];
        		$this->selectAll= false;
        	}else{
        		$this->emit('error');
        	}
     		
        }else{
        	$this->emit('error');
        }
    	
        
    }

    public function getAllUsers(){
    	$this->selectAllGroups = true;
    	$this->emit('select-all-employees');
    }

    public function getBundleItems(){
    	$lineItems     = '';
        $itemArray     = [];
    	$bundle = DB::table('pvt_bundled_lab_items as b')->join('lab_category as l','l.id','b.lab_item_id')->select('b.lab_item_id','l.category as name','l.price','b.bundled_lab_id as group_id')->where('b.bundled_lab_id','=',$this->bundleId)->get();
    	
    	foreach ($bundle as  $item) {
    	  $lineItems .= $item->name.'|'.$item->price.'*';
          $temp_array['id'] = $item->lab_item_id;
          $temp_array['name']   = $item->name;
         
          array_push($itemArray, $temp_array);
    	}
    	return $itemArray;
    }

    public function addBill(){
    	
    	if(Bill::where('partner_token', \Session::get('partnerToken'))->where('bill_type','lab')->exists()){
    	   Bill::where('partner_token', \Session::get('partnerToken'))->where('bill_type','lab')->increment('amount',$this->billAmount);
    	}else{
    		$bill = new Bill;
	    	$bill->amount        = $this->billAmount;
	    	$bill->partner_token = \Session::get('partnerToken');
	    	$bill->bill_type     = 'lab'; 
	    	$bill->status        = 0; 
	    	$bill->save();
    	}
    	
    }

    public function calculateBillAmount(){
    	$price =  \Session::get('price') * count($this->checked);
    	$this->billAmount = number_format($price, 2, '.', ''); 
    	//dd($price);
    	//$this->billAmount = $price ;
    }

}
