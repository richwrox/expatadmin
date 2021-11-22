<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Core\GlobalService;
use App\Core\MakesApiRequest;


class AddNewBusiness extends Component
{
	use GlobalService; use MakesApiRequest;

    public $countries;
	public $countryName;
	public $showPhoneValidationState = false;
	public $companyName;
	public $firstName;
	public $lastName;
	public $email;
	public $industry;
	public $phoneNumber;
	public $companySize;
	public $address;
	public $termsandconditions;

	public function getCountryCode($data){
        return ($data == null) ? 'GH' : explode('|',$data);
    }

    public function render()
    {
    	$this->countries = [];
        return view('livewire.add-new-business');
    }

    public function createPartnerAccount(){
    	$rules = [
	  	  'companyName'=>'required',
	  	  'firstName'=>'required',
	  	  'lastName'=>'required',
	  	  'email'=>'required|email',
	  	  'industry'=>'required',
          'phoneNumber'=>'required',
          'termsandconditions'=>'required',
    	];

        $messages =[
        'firstName' => 'Firstname is missing',
        'lastName'=>'Lastname is missing',
	  	'email.email' =>'Invalid email address',
	  	'industry' => 'Select an option',
	  	'termsandconditions'=>'Do you agree to the terms and conditions'
	  ];

	  $this->validate($rules,$messages);
	  if($this->termsandconditions == false){ $this->emit('agree_to_terms');}
    	$data = [
    		'partnerName'=> $this->sanitizeString($this->companyName),
    		'address'=> $this->sanitizeString($this->address),
    		'phone'=> $this->sanitizeString($this->phoneNumber),
    		'email'=>$this->sanitizeString($this->email),
    		'industry'=>$this->sanitizeString($this->industry),
    		'companySize'=>$this->sanitizeString($this->companySize),
    		'country'=> $this->sanitizeString($this->countryName),
    	];
    	
    	$createAccount = $this->createBusinessAccount($data);
    	
    	switch ($createAccount['statusCode']) {
    		case 201:
    			//Create user account
    		    $userData = [
    		    'firstName'=>$this->sanitizeString($this->firstName),
    		    'lastName'=>$this->sanitizeString($this->lastName),
    		    'email'=>$this->sanitizeString($this->email),'phone'=>$this->sanitizeString($this->phoneNumber),
    		    'designation'=>'client-admin','partnerId'=>$createAccount['data']['partner_id']];
    		    $response = $this->addUser($userData);
    		    
    		    if($response['statusCode'] == 201){
    		    	
    		    	$this->emit('request_successful');
    		    	session(['userName' => $this->firstName.' '.$this->lastName,'userEmail' => $this->email,'id'=>$response['data']['token'],
    		    		'role'=>'partner','token'=>$response['data']['token'] ]);
                    //Redirect to form completion page
                    return redirect()->to('/user/home');
    		    }else{
    		    	$this->emit('error_creating_account');
    		    	//Revert the process
    		    }
    			break;

    		case 409:
    			//Account taken
    		    $this->emit('account_already_exits');
    			break;
    		
    		default:
    			# General error
    			break;
    	}
    }
    
}
