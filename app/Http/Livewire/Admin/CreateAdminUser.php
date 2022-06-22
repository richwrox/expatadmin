<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Str;

class CreateAdminUser extends Component
{
	public $FirstName;
	public $LastName;
	public $Email;
	public $Role;

    protected $rules = [
        'FirstName' => 'required', 'LastName' => 'required',
        'Email' => 'required|email','Role' => 'required',
    ];

    //protected $listeners = ['UserAlredayExists'];

    public function render()
    {
        return view('livewire.admin.create-admin-user');
    }


    public function addUser(){
       	$user = new User;
     
        if(User::where('email', $this->Email)->exists()) {
               $this->emit('UserAlredayExists');
               return null;
        }
       //$this->validate();
       try{
        $verificationCode = substr(number_format(time() * rand(),0,'',''),0,6);
        $user->name       = $this->FirstName.' '.$this->LastName;
        $user->email      = $this->Email;
        $user->role_id    = $this->Role;
        $user->userid     = (string) Str::uuid();
        $user->password   =  bcrypt($verificationCode); 
        $user->save();
        //Send email of default pin
        $this->emit('UserAdded');
       }catch(\Exception $e){

       }
       

    }
}
