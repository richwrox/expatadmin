<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Core\GlobalService;
use App\Core\MakesApiRequest;
use Propaganistas\LaravelPhone\PhoneNumber;
use Session;

class AddNewEmployee extends Component
{
	use MakesApiRequest;

	public $countries;
	public $email;
	public $firstName;
	public $lastName;
	public $phoneNumber;
	public $gender;
	public $dob;
	public $location;
    public $countryList;
    public $country;
    public $phonecode;
    public $countryName;
    public $showPhoneValidationState = false;

    protected $listeners = ['account_created'=>'render'];

    public function render()
    {
    	$response = $this->fetchListOfCountries();
    	$this->countries = $response['data'];

        return view('livewire.add-new-employee',['countries'=>$this->countries]);
    }

    public function getCountryCode($data){
        return ($data == null) ? 'GH' : explode('|',$data);
    }

    public function createEmployessAccount(){
    	$getCode    = $this->getCountryCode($this->countryName);
    	
    	$rules = [
	  	  'firstName'=>'required',
	  	  'lastName'=>'required',
	  	  'countryName'=>'required',
	  	  'email'=>'required|email',
          'phoneNumber'=>'required',
          'countryName'=>'required',
    	];

    	$messages =[
        'firstName' => 'Firstname is missing',
        'lastName'=>'Lastname is missing',
	  	'email.email' =>'Invalid email address',
	  	'phoneNumber' => 'Select an option',
	  	'countryName'=> 'Select a country'
	  ];
       $fmtPhone   = $this->formatPhoneByCountry($this->phoneNumber,$getCode[1]);
    
       $data = [
    		'firstName'=> $this->firstName,
    		'lastName'=> $this->lastName,
    		'email'=> $this->email,
    		'phone'=> $this->phoneNumber,
    		'gender'=> $this->gender,
    		'location'=>'',
    		'country'=> $this->country,
    		'profileUrl'=>'',
    		'allergies'=>'',
    		'birthDate'=> $this->dob,
    		'partnerToken'=> Session::get('partnerToken')
    	];
    	$this->validate($rules,$messages);
       
        //dd($getCode[1]);
    	$response = $this->addEmployeeAccount($data);
    	
    	switch ($response['statusCode']) {
    		case 201:
    			$this->emit('account_created');
    			$this->reset();
    			break;

    		case 409:
    			$this->emit('account_taken');
    			break;
    		
    		default:
    			$this->emit('general_error');
    			break;
    	}
    }


    public function formatPhoneByCountry($phone,$countryCode){
        try{
          return ($phone == null) ? $phone : PhoneNumber::make($phone ,['GH',$countryCode])->formatE164();  
      }catch(\Exception $e){
        return 0;
      }
        
    }


}
