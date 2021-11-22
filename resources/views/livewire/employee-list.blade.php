<div>
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                
               <div class="row">

               	<div class="col-md-3">
               		<select class="form-control">
               			<option value="all-groups">All Groups</option>

               		</select>
               	</div>

               	<div class="col-md-3">
               		<select class="form-control">
               			<option value="all">Status</option>
               			
               		</select>
               	</div>

               	<div class="col-md-3">
               		<input type="type" class="form-control" placeholder="Search By Name" name="">
               	</div>


               </div>
                
              </div>
            </div>
          </div>

          

 </div>

<div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">User List ({{ $employeeList->total() }})</h6>
               
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Gender</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Group</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($employeeList as $data)
                        	<tr>
	                          <td> {{ $data->first_name }} {{ $data->last_name }} </td>
	                          <td> {{ $data->gender }}</td>
	                          <td> {{ $data->phone }}</td>
	                          <td> {{ $data->email }}</td>
	                          <td> General</td>
	                          <td>@mdo</td>
                        	</tr>
                        @endforeach

                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>

          
       <div class="col-md-12">
       		{{ $employeeList->links() }}
       </div>
 </div>



</div>
