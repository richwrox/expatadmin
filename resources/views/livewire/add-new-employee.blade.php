<div>

   <div wire:ignore.self class="modal fade add-new-employee-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
                <div class="modal-header">
                  <h6 class="modal-title color-site-primary " id="staticBackdropLabel">
                    
                 Add New Employee</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                      <form  wire:submit.prevent="createEmployessAccount">
                     
                       <div class="row">
                         <div class="form-group col-md-12">
                        <label for="">Firstname</label>
                        <input type="text" wire:model.lazy="firstName" value="{{ old('firstName') }}" class="form-control input-lg cs-input" placeholder="Firstname">
                        @error('firstName') <span class="error text-danger">{{ $message }}</span> @enderror
                      </div>

                       <div class="form-group col-md-12">
                        <label for="">Lastname</label>
                        <input type="text" wire:model.lazy="lastName" value="{{ old('lastName') }}" class="form-control input-lg cs-input" 
                        placeholder="Lastname">
                        @error('lastName') <span class="error text-danger">{{ $message }}</span> @enderror
                      </div>
                       </div>


                    <div class="row">
		                    <div class="form-group col-md-12">
		                        <label for="">Country <span>*</span></label>
		                        <select wire:model="countryName" name="countryName" class="input-lg cs-input">
		                          <option selected="" value="233|GH|Ghana">Select an option</option>
		                          @foreach($countries as $data)
		                            <option value="{{ $data['phonecode'] }}|{{ $data['countrycode'] }}|{{ $data['countryname'] }}">{{ $data['countryname'] }}</option>
		                          @endforeach
		                        </select>
		                        @error('countryName') <span class="error text-danger">{{ $message }}</span> @enderror
		                      </div> 
		            

		                      <div class="col-md-12 ">
		                          <label for="">Email address</label>
		                          <input type="email" wire:model.lazy="email"  value="{{ old('email') }}" class="form-control input-lg cs-input" id="" 
		                        placeholder="Email">
		                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
		                      </div>

		                     <div class="form-group col-md-6 mt-3">
			                        <label for="">Phone <span>*</span></label>
			                        <input type="tel"   wire:model.lazy="phoneNumber" value="{{ old('phoneNumber') }}" class="form-control input-lg cs-input" id="phone-input" 
			                        placeholder="0548098135">
			                         @error('phoneNumber') <span class="error text-danger">{{ $message }}</span> @enderror

			                         @if($showPhoneValidationState) <span class="error text-danger">Invalid phone number</span> @endif
			                       
			                      
			                 </div>



			                <div class="form-group col-md-6 mt-3">
		                        <label for="">Gender <span>*</span></label>
		                        <select wire:model.lazy="gender" class="input-lg cs-input">
		                          <option value="">Select an option</option>
		                          <option value="Male">Male</option>
		                          <option value="Female">Female</option>
		                        </select>
		                        @error('gender') <span class="error text-danger">{{ $message }}</span> @enderror
		                    </div>

		            </div>



                 </div>

     

                      <div class="rows-1">        	
                    
                      <div class="text-center mt-4">
                          <div class="alert alert-info col-md-12" wire:loading wire:target="createEmployessAccount">
                           <span class=""><strong>Processing Request...</strong></span>
                         </div>
                      </div>
                     </div>


                      	<div class="col-md-12 mt-4 mb-4">
                      		  <button class="btn btn-block btn-primary mt-2 mr-2 mb-2 mb-md-0 btn-large btn-round-sm bt">
                        <i class="mdi mdi-send"></i>  Submit</button>
                      	</div>

                      </div>


                      </form>
                </div>
              
              </div>
  </div>
</div>

 <script>

	document.addEventListener('livewire:load', function () {

	    @this.on('account_created', () => {
		    toastr.success('Account created successfully', 'Success', {timeOut: 5000});
		    $('.add-new-employee-modal-lg').modal('hide');
		});

		
		@this.on('account_taken',()=>{
			toastr.error('Unable to create the account please try again later', 'Sorry', {timeOut: 5000})
		});

		@this.on('general_error',()=>{
			toastr.error('Unable to create the account please try again later', 'Sorry', {timeOut: 5000})
		});

		})

</script>

</div>
