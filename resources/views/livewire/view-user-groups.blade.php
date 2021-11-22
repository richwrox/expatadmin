
    <div class="col-md-12">
    	<div class="col-12 col-md-3 ">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Select Group</h5>
          
        <div class="form-group">
			<!-- <div class="form-check">
				<label class="form-check-label">
					<input type="radio" class="form-check-input" name="optionsRadios" wire:click="getAllUsers" id="" value="">
						All Groups 
					<i class="input-frame"></i></label>
			</div> -->	
			@foreach($myGroups as $groups)
				<div class="form-check">
				<label class="form-check-label">
					<input type="radio" class="form-check-input" name="optionsRadios" wire:click="getSelectedGroup({{$groups->id}})" id="{{ $groups->id }}" value="{{ $groups->id }}">
						{{ $groups->group_name }}
					<i class="input-frame"></i></label>
			</div>
			@endforeach			
										
		</div>


        </div>
      </div>
    </div>

    <div class="col-12 col-md-9 ">
      <div class="card">
        <div class="card-body">
          <!-- <h5 class="card-title">User List</h5> -->
          Bill Amount GHS {{ $billAmount }}
          <div class="row mt-4">
          	<div class="col-md-4 mt-4">Test Date
          		<input wire:model="testDate"
    type="text" class="form-control datepicker mt-1" placeholder="Pick a date" 
    autocomplete="off"
    data-provide="datepicker" data-date-autoclose="true" 
    data-date-format="mm/dd/yyyy" data-date-today-highlight="true"                        
    onchange="this.dispatchEvent(new InputEvent('input'))"
>
			 <div class="col-md-12">
                          @error('testDate') <span class="error text-danger">{{ $message }}</span> @enderror
             </div>

          	</div>
          	<div class="col-md-4 mt-4">Time of Test
          		<select class="form-control" wire:model="timeOfTest">
          			<option value="">Select a slot</option>
          			<option value="1-2pm">1-2pm</option>
          			<option value="3-5pm">3-5pm</option>
          		</select>
          		<div class="col-md-12">
                          @error('timeOfTest') <span class="error text-danger">{{ $message }}</span> @enderror
             </div>
          	</div>
          	<div class="col-md-4 mt-4">Sample Location
          		<input type="text" class="form-control mt-1" placeholder="Sample Location" wire:model="sampleLocation">
          		<div class="col-md-12">
                          @error('sampleLocation') <span class="error text-danger">{{ $message }}</span> @enderror
             </div>
          	</div>
          </div>
          
          <div class="float-right">
          	
            <form wire:submit.prevent="bookingSummary" method="POST">
                        @csrf
                         <button @if(count($checked) === 0) disabled @endif style="float: right; margin-right: 5px" class="btn btn-dark mt-2"> 
                         	<i style="font-size: 1.2em !important;" class="mdi mdi-cart-plus"></i> 
                         <div wire:loading wire:target="bookingSummary" class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>	Book
                         	
                         </button>
                         
                     </form>
          </div>
          @if(!is_null($employees))

				
				   <table class="table">
											<thead>
												<tr>
													<th>
													@if($selectedGroup > 0) 
														<div class="form-check form-check-inline"><label class="form-check-label">
													<input type="checkbox" wire:model="selectAll" class="form-check-input focus:outline-none focus:shadow-outline">
													<i class="input-frame"></i></label> Select All

													</div>
													 @endif
													</th>
													<th>USERNAME</th>
													<!-- <th>GROUP</th>   -->
													<th>EMAIL</th>
													<th>PHONE</th>
												</tr>
											</thead>
											<tbody>
												@foreach($employees as $user)
													<tr>
													<td>
														<div class="form-check form-check-inline"><label class="form-check-label">
													<input type="checkbox" class="form-check-input" wire:model="checked" value="{{$user->token}}">
													<i class="input-frame"></i></label>

													</div>
													</td>

													<td>{{ $user->first_name }} {{ $user->last_name }}</td>
													<!-- <td></td> -->
													<td>{{ $user->email }}</td>
													<td>{{ $user->phone }}</td>

												</tr>
												@endforeach
												
											</tbody>
										</table>
				
            
            @else
            	
            	No Data Available

          @endif

          
        </div>
      </div>
    </div>

       <script>

	document.addEventListener('livewire:load', function () {

	    @this.on('submitted', () => {
		    toastr.info('You request has been submitted successfully', 'Success', {timeOut: 8000});

		});

		@this.on('erroe', () => {
		    toastr.info('You request has been submitted successfully', 'Success', {timeOut: 9000});

		});


	})

</script>

    </div>



