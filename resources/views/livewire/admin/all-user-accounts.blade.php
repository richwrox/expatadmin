<div>
<table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Reg.Date</th>
                        <th>Role</th>
                        <th>Date</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    	@foreach($users as $data)
                    	<tr>
                    		<td>{{$data->name}}</td>
                    		<td>{{$data->email}}</td>
                    		<td>{{$data->name}}</td>
                    		<td>Admin</td>
                            <td>{{ Carbon\Carbon::parse($data->created_at)->format('d-M-Y') }}</td>
                    		<td>
                            <div class="demo-inline-spacing">
                            <button wire:click="$emit('setUserId', {{$data}} )" data-bs-toggle="modal" data-bs-target="#editModal" type="button" class="btn btn-icon btn-sm btn-primary">
                              <span class="tf-icons bx bx-edit"></span>
                            </button>
                            <!-- <button type="button" class="btn btn-icon btn-secondary">
                              <span class="tf-icons bx bx-bell"></span>
                            </button>
                            <button type="button" class="btn rounded-pill btn-icon btn-primary">
                              <span class="tf-icons bx bx-pie-chart-alt"></span>
                            </button>
                            <button type="button" class="btn rounded-pill btn-icon btn-secondary">
                              <span class="tf-icons bx bx-bell"></span>
                            </button> -->
                          </div>
                    		</td>
                    	</tr>

                        @endforeach
                    

                    </tbody>
        </table>

        <div class="col-md-12 ml-4">
            @if($users->total() != 0)
            <p> Total: {{ $users->total() }} </p>
            @endif
        
            <p class="mt-2"> {{ $users->links() }} </p>   
        </div>
</div>
