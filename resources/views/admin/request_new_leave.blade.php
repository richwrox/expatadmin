@extends('baselayout')

@section('content')
  <nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Leave</a></li>
						<li class="breadcrumb-item active" aria-current="page">New Request</li>
					</ol>
  </nav>



  <div class="row">
	<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
				<h6 class="card-title">Leave Request</h6>
				
					@livewire('request-new-leave')

              </div>
            </div>
	</div>
				
	</div>


@endsection

@push('scripts')@endpush






