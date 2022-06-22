@extends('baselayout')


@section('title', 'Dashboard')


@section('content')

<div class="card">
               
    <div class="table-responsive text-nowrap">
    	<table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Reg. Date</th>
                        <th>Filings</th>
                        <!-- <th>Options</th> -->
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    	@foreach($users as $data)
                    	<tr>
                    		<td>{{ $data->name }}</td>
                    		<td>{{ $data->email }}</td>
                    		<td>{{ $data->created_at }}</td>
                        <td>
                          <a href="/view-filings/32443">View</a>
                        </td>
                    		<!-- <td>
                    			<button>Vie</button>
                    		</td> -->
                    	</tr>
                    	@endforeach

                    </tbody>
        </table>
    </div>

</div>

@endsection


@push('scripts')


@endpush