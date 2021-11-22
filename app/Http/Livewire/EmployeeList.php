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
        return view('livewire.employee-list',['employeeList'=> \DB::table('institution_users AS I')->join('patients AS P','P.token','=','I.user_token')->select('P.*')->where('I.institution_token','=','6936f353-e6ff-4d99-95e9-3011d3584f1d')->orderBy('P.created_at','DESC')->paginate(3) ]);
    }
}
