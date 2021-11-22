<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Core\GlobalService;
use App\Core\MakesApiRequest;


class UserSigin extends Component
{
	use MakesApiRequest;
	public $userId;
	public $password;

	//protected $listeners = ['signing_in'=>'updateSampleStatus'];

    public function render()
    {
        return view('livewire.user-sigin');
    }

    public function signIn(){
    	$rules = [
	  	  'userId'=>'required|email',
	  	  'password'=>'required'
    	];

        $messages =[
        'userId' => 'Please provide a valid email',
        'password'=>'This field is required'];

        $this->validate($rules,$messages);

    	$data     = ['email'=>$this->userId,'password'=>$this->password];
    	$response = $this->loginUser($data);
    	if($response['statusCode'] == 201){
    		
    		$this->emit('request_successful');

    		session(['userName' => $response['data']['first_name'].' '.$response['data']['last_name'],'userEmail' => $response['data']['email'],'id'=>$response['data']['token'],'role'=>'partner','token'=>$response['data']['token'],'partnerToken'=>$response['data']['partner_token'] ]);

            return redirect()->to('/user/home');
    		}else{
    		   $this->emit('error_creating_account');
    		    	//Revert the process
        }
    }
}
