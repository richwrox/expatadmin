@extends('baselayout')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
            
        
            <a href="#" type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0 ">
              <i class="btn-icon-prepend" data-feather="user"></i>
              Bulk Request
            </a>

            <a href="#" type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-toggle="modal" data-target=".add-new-employee-modal-lg">
              <i class="btn-icon-prepend" data-feather="user"></i>
              Add New Employee
            </a>

          </div>
        </div>

 
 
   @livewire('employee-list')

 
 @livewire('add-new-employee')


@endsection