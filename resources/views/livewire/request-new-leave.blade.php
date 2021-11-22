<div class="row">
	         <div class="alert alert-success"
		   	   x-data="{show: false}" 
		   	   x-show="show"
		   	   x-init="@this.on('request_successful',()=>{show=true; setTimeout(()=>{ show=false },1500) })"
		   	   style="display: none;">Item was added successfully</div> 
					<div class="col-md-6 ">
			            <div class="cards">
			              <div class="card-bodys">
			              	<div class="alert alert-light">
			              		Current Leave Balance ({{ $myLeaveBalance }})
			              	</div>
			              	<form class="forms-sample" wire:submit.prevent="createRequest">
			              			<div class="form-group">
										<label for="exampleInputUsername1">Leave Type</label>
										<select wire:model="leaveType" class="form-control">
											<option>Select an option</option>
											@foreach($leaveTypes as $leaveType)
											 <option value="{{ $leaveType['id'] }}"> {{ $leaveType['slug'] }}</option>
											@endforeach
										</select>
										@error('leaveType') <span class="error text-danger mt-4">{{ $message }}</span> @enderror
									</div>

									<div class="row">
										<div class="col-md-6 form-group">
										<label for="exampleInputUsername1">Start Date</label>
										<input wire:model="startDate" type="date" class="form-control"  autocomplete="off" placeholder="startdate">
										@error('startDate') <span class="error text-danger mt-4">{{ $message }}</span> @enderror
									    </div>

									    <div class="col-md-6 form-group">
										<label for="exampleInputUsername1">End Date</label>
										<input wire:model="endDate" type="date" class="form-control"  autocomplete="off" placeholder="startdate">
									     @error('endDate') <span class="error text-danger mt-4">{{ $message }}</span> @enderror
									    </div>
									</div>

									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label for="exampleInputUsername1">Submit To</label>
												<input wire:model="submitTo" type="text" class="form-control">
												<!-- <select class="form-control">
													<option>Line Manage</option>
												</select> -->
												@error('submitTo') <span class="error text-danger mt-4">{{ $message }}</span> @enderror
											</div>
										</div>

										<div class="col-md-4">
											<label class="mt-4"> <a href="#">Change</a></label>
										</div>

									</div>

									<div class="form-group">
										<label for="exampleInputUsername1">*Handing Over Notes:</label>
										<input wire:model="handingOverNote" type="file" class="form-control" >
										@error('handingOverNote') <span class="error text-danger mt-4">{{ $message }}</span> @enderror
									</div>

									<div class="form-group">
										<label for="exampleInputUsername1">Comments</label>
										<textarea wire:model="comment" class="form-control" rows="10"></textarea>
										@error('comment') <span class="error text-danger mt-4">{{ $message }}</span> @enderror
									</div>

										<div class="col-md-12 mt-4">
	                      		             <div wire:loading wire:target="createRequest">
	        					               <span class=" txt-site-primary"><strong>Processing request...</strong></span>
	    					                 </div>
                      	               </div>

									<div class="form-group mt-4">
										<button style="padding-top: 20px; padding-bottom: 20px"  class="btn btn-dark btn-block">Submit Request</button>
									</div>


			              	</form>
			              </div>
			            </div>
			        </div>
			        <script>

					 document.addEventListener('livewire:load', function () {

					        @this.on('request_successful', () => {
					        	toastr.success('Request has been sent successfully panding approval', 'Success', {timeOut: 5000})
					        });

					        @this.on('balance_insufficient',()=>{
					        	toastr.error('Insufficient Leave Balance', 'Sorry', {timeOut: 5000})
					        });

					    })

					</script>


				</div>




