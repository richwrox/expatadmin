 <div>
          <form style="background: #fff" class="login100-form signup-form" wire:submit.prevent="createPartnerAccount">
         <!--  <span class="login100-form-title p-b-3"> Create a business account </span> -->
          <p class="login100-form-title p-b-3"> Create a business account </p>
          

              @if(Session::has('error_message'))
                        <div class="alert alert-danger d-flex align-items-center alert-me" role="alert">
                         <i data-feather="alert-circle" class="mg-r-10"></i> 
                          {{ Session::get('error_message') }}
                        </div>
                    @endif

                      @if(Session::has('success_message'))
                        <div class="alert alert-success d-flex align-items-center alert-me" role="alert">
                         <i data-feather="alert-circle" class="mg-r-10"></i> 
                          {{ Session::get('success_message') }}
                        </div>
                    @endif
          
          
          <div class="wrap-input1001 validate-input mt-4" data-validate = "">
             
              <input type="text" wire:model.lazy="companyName" value="{{ old('companyName') }}" class="form-control input-xl cs-input border-light" placeholder="Company Name">
              @error('companyName') <span class="error text-danger">{{ $message }}</span> @enderror

          </div>

          <div class="wrap-input1001 validate-input mt-4" data-validate = "">
             
              <input type="text" wire:model.lazy="firstName" value="{{ old('firstName') }}" class="form-control input-xl cs-input border-light" placeholder="First Name">
              @error('firstName') <span class="error text-danger">{{ $message }}</span> @enderror

          </div>


          <div class="wrap-input1001 validate-input mt-4" data-validate = "">
             
              <input type="text" wire:model.lazy="lastName" value="{{ old('lastName') }}" class="form-control input-xl cs-input border-light" placeholder="Last Name">
              @error('lastName') <span class="error text-danger">{{ $message }}</span> @enderror

          </div>


          <div class="wrap-input1001 validate-input mt-4" data-validate= "">
              <input type="email" wire:model.lazy="email"  value="{{ old('email') }}" class="form-control input-xl cs-input border-light" id="" 
                        placeholder="Work Email">
              @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
          </div>

             <div class="wrap-input1001 validate-input mt-4" data-validate = "">
                <select style="border-color: #EFEFEF; color: #000;" wire:model="industry" name="industry" class="input-xl">
                    <option value="">Industry</option>
                    <option value="Health Care">Health Care</option> 
                    <option value="Manufacturing">Manufacturing</option>  
                    <option value="Entertainment">Entertainment</option>    
                </select>
                @error('industry') <span class="error text-danger">{{ $message }}</span> @enderror
          </div>

          <div class="wrap-input1001 validate-input mt-4" data-validate = "">
                <select style="border-color: #EFEFEF; color: #000;" wire:model="countryName" name="countryName" class="input-xl">
                    <option selected="" value="Ghana">Ghana</option>
                   <!--  <option selected="" value="233|GH|Ghana">Ghana</option> -->
                      @foreach($countries as $data)
                      <option value="{{ $data->phonecode }}|{{ $data->countrycode }}|{{ $data->countryname }}">{{ $data->countryname }}</option>
                      @endforeach       
                </select>
                @error('countryName') <span class="error text-danger">{{ $message }}</span> @enderror
          </div>


          <div class="wrap-input1001 validate-input mt-4" data-validate = "">
              <input type="tel"   wire:model.lazy="phoneNumber" value="{{ old('phoneNumber') }}" class="form-control input-xl cs-input border-light" id="phone-input" 
                        placeholder="Phone Number">
                         @error('phoneNumber') <span class="error text-danger">{{ $message }}</span> @enderror

                         @if($showPhoneValidationState) <span class="error text-danger">Invalid phone number</span> @endif
          </div>



          <div class="wrap-input1001 validate-input mt-4" data-validate = "">
                <select style="border-color: #EFEFEF; color: #000;" wire:model="companySize" name="noofemployees" class="input-xl">
                    <option value="">Company Size</option>
                    <option value="1-50">1-50</option> 
                    <option value="50-500">50-500</option>  
                    <option value="More than 500">More than 500</option>    
                </select>
                @error('companySize') <span class="error text-danger">{{ $message }}</span> @enderror
          </div>



          <div class="wrap-input1001 validate-input mt-4" data-validate = "">
               <fieldset id="wrap-terms-port">
                              
                              <label>
                                <input type="checkbox"   wire:model.lazy="termsandconditions" class="input-lg cs-input" value="true"  />
                                <span id="txt-agree"> I agree to the Terms and Conditions</span>
                              </label>
                              <p class="col-md-9">
                              @error('termsandconditions') <span class="error text-danger">{{ $message }}</span> @enderror
                            </p>
                            </fieldset>
          </div>




          <div class="wrap-input1001" data-validate = "">
              <div class="text-center">
                          <div class="alert alert-info col-md-12" wire:loading wire:target="createPartnerAccount">
                           <span class=""><strong>Processing Request...</strong></span>
                         </div>
              </div>
              
          </div>
         

			<a href="/" class="d-block mt-3 text-muted">Already have an account? Sign in</a>

          <div class="container-login100-form-btn mt-4">
                 <button type="submit" class="p-3 btn-large btn-round-sm btn btn-site-primary btn-block text-white mr-2 mb-2 mb-md-0">
                          <span class="signup-txt">Sign up</span> 
                 </button> 
          </div>




          <div class="button-group-download p-t-89 ">

                 <div class="store-buttons m-l-3">
                    <a target="_blank" href="https://play.google.com/store/apps/details?id=com.axxendcorperation.newhealthneutron"> 
                          <img style="width:90% !important" id="site-logo" src="{{ asset('../assets/images/play-store-icon.jpg') }}" 
                          alt="Play Store"></a>
                 </div>

                 <div class="store-buttons">
                   <a target="_blank" href="https://apps.apple.com/mu/app/healthneutron/id1553826704"> 
                          <img style="width:90% !important" id="site-logo" src="{{ asset('../assets/images/apple-store.jpg') }}" 
                          alt="App Store"> </a>
                 </div>

          </div>
          

        </form>     

 <script>

	document.addEventListener('livewire:load', function () {

	    @this.on('request_successful', () => {
		    toastr.success('Account created successfully', 'Success', {timeOut: 5000})
		});

		@this.on('account_already_exits',()=>{
			toastr.error('An account with this email already exist', 'Sorry', {timeOut: 5000})
		});

		})

</script>

</div>

