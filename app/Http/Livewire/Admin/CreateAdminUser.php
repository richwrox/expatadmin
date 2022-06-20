<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class CreateAdminUser extends Component
{

	public $FirstName;
	public $LastName;
	public $Email;
	public $Role;
    public function render()
    {
        return view('livewire.admin.create-admin-user');
    }


    public function addUser(){
    	
    }
}
