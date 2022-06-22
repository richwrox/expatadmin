@extends('baselayout')


@section('title', 'Dashboard')


@section('content')

<div class="card">

    <div class="demo-inline-spacing mb-4">
         
          <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#basicModal">News User</button>
    </div>

    <div class="table-responsive text-nowrap">
    	 @livewire('admin.all-user-accounts')
    </div>

   <div>
      @livewire('admin.create-admin-user')
   </div>
  

   @livewire('admin.edit-user-account')

    
</div>

@endsection


@push('scripts')


@endpush