


<div >

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   
  <form action="">
      <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editModal">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            <div class="row">
                        <div class="col mb-3">
                          <label for="nameBasic" class="form-label">FirstName</label>
                          <input type="text" class="form-control" wire:model="FirstName" placeholder="Enter FirstName">
                          @error('FirstName') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                      <div class="row">
                        <div class="col mb-3">
                          <label for="nameBasic" class="form-label">LastName</label>
                          <input type="text" class="form-control" wire:model="LastName" placeholder="Enter LastName">
                          @error('LastName') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                      </div>


                      <div class="row g-2">
                        <div class="col mb-0">
                          <label for="emailBasic" class="form-label">Email</label>
                          <input type="text" class="form-control" wire:model="Email" placeholder="xxxx@xxx.xx">
                          @error('Email') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col mb-0">
                          <label for="dobBasic" class="form-label">Role</label>
                          <select class="form-control" wire:model="Role">
                            <option value="1">Global Admin</option>
                            <option value="2">Site Admin</option>
                          </select>
                        </div>
                      </div>


            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>


          </div>

      </div>
  </form>

  

</div>

<script>
        document.addEventListener('livewire:load', function () {

            @this.on('UserAdded', () => {
                      $('#basicModal').modal('hide');
                      Swal.fire({
                    // position: 'top-end',
                      icon: 'success',
                      title: 'Record Updated',
                      showConfirmButton: false,
                      timer: 5500
                });
            });
        });
    </script>

</div>


