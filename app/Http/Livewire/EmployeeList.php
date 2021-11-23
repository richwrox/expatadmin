<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Livewire\WithPagination;
use App\Core\MakesApiRequest;

class EmployeeList extends Component
{
	use WithPagination;
	protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.employee-list',['employeeList'=> \DB::table('institution_users AS I')->join('patients AS P','P.token','=','I.user_token')->select('P.*')->where('I.institution_token','=',\Session::get('partnerToken'))->orderBy('P.created_at','DESC')->paginate(3) ]);
    }
}
