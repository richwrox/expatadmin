
<div  wire:ignore.self class="modal fade" id="basicModal" tabindex="-1"  aria-modal="true" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">

              	<form wire:submit.prevent="addUser">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">New </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label">FirstName</label>
                      <input type="text" class="form-control" wire:model="FirstName" placeholder="Enter FirstName">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label">LastName</label>
                      <input type="text" class="form-control" wire:model="LastName" placeholder="Enter LastName">
                    </div>
                  </div>


                  <div class="row g-2">
                    <div class="col mb-0">
                      <label for="emailBasic" class="form-label">Email</label>
                      <input type="text" class="form-control" wire:model="Email" placeholder="xxxx@xxx.xx">
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
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                  <button class="btn btn-primary">Save changes</button>
                </div>

                </form>

              </div>
            </div>
    </div>
