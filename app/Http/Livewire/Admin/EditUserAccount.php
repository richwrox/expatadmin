<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class EditUserAccount extends Component
{
    protected $listeners = ['setUserId'];
    public $FirstName;
	public $Email;
    public function render()
    {
        return view('livewire.admin.edit-user-account');
    }

    public function setUserId($data){
     
    //    $this->FirstName = $data['name'];
    //    $this->Email = $data['email'];
    }
}

// "id" => 1
// "userid" => "23"
// "name" => "Sam Addo"
// "email" => "test@gmail.com"
// "role_id" => null
// "userstatus" => 0
// "passwordactive" => 0
// "password_expiration" => null
// "softdelete" => 0
// "loginstatus" => 0
// "created_at" => "2022-02-23T14:52:26.000000Z"
// "updated_at" => null
// "type" => "1"