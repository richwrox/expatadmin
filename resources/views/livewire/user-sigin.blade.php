<div>
   
				<form class="forms-sample" wire:submit.prevent="signIn">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" wire:model.lazy="userId" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        @error('userId') <span class="error text-danger">{{ $message }}</span> @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" wire:model.lazy="password" class="form-control" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password">
                        @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
                      </div>


                     
                      
                      <div class="mt-3">
                       <!--  <a href="../../dashboard-one.html" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Login</a> -->
                       <button type="submit" class="btn btn-outline-dark btn-block p-2">
                        <div class="" wire:loading wire:target="signIn">
                           <div class="spinner-border" role="status">
                          <span class="sr-only">Loading...</span>
                        </div>
                         </div>  Sign In 
                        </button>

                     

                        <!-- <a href="/signin"type="button" class="btn btn-outline-dark btn-block">
                          <img style="width: 30px" src="../../../assets/images/ms-logo.jpg">
                          Sign In With Microsoft
                        </a> -->
                      </div>
                        <!-- <div class="mt-3 text-center">
                          or
                       </div> -->
                      <a href="/signup" class="d-block mt-3 text-muted">Not a user? Sign up</a>
    			</form>


           <script>

            document.addEventListener('livewire:load', function () {

                @this.on('error_creating_account', () => {
                  toastr.error('Invalid Credentials', 'Sorry', {timeOut: 5000})
              });


              });

          </script>

</div>
