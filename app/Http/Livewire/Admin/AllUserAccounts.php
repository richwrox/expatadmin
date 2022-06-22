<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class AllUserAccounts extends Component
{
    use WithPagination;

    public $search = '';
    public $currentView = 'accountList';

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['UserAdded'=>'render','setEditMode'];

    public function render()
    {
        $users = User::orderBy('created_at','DESC')->paginate(15);
        return view('livewire.admin.all-user-accounts',['users'=>$users]);
    }

    public function setEditMode($data){
        $this->currentView = 'editAccount';
    }

}
