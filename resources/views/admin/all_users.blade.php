@extends('baselayout')


@section('title', 'Dashboard')


@section('content')

<div class="card">

    <div class="demo-inline-spacing mb-4">
         
          <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#basicModal">News User</button>
    </div>

    <div class="table-responsive text-nowrap">
    	<table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Reg.Date</th>
                        <th>Role</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    	
                    	<tr>
                    		<td>Mike White</td>
                    		<td>test@mail.com</td>
                    		<td>23-04-22</td>
                    		<td>Admin</td>
                    		<td>
                    			<button>Edit</button>
                    		</td>
                    	</tr>
                    

                    </tbody>
        </table>
    </div>


   @livewire('admin.create-admin-user')



</div>

@endsection


@push('scripts')


@endpush