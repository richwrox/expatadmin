<div>
    <div class="row">

    @foreach($labs as $data)
    <div class="col-md-3 mt-2">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{$data->bundle_name}}</h5>
          <p class="card-text ">
          	<img width="300" src="{{$data->img_url}}">
          </p>
          <a href="#" class="btn btn-primary mt-2" wire:click="addToCart({{ $data->id }},{{$data->price}},'{{$data->bundle_name}}','{{$data->package_code}}')">Select (GHS {{$data->price}})</a>
        </div>
      </div>
    </div>
    @endforeach
 
  </div>



   <script>

	document.addEventListener('livewire:load', function () {

	    @this.on('item_added', () => {
		    toastr.info('Redirecting...', 'Item Added', {timeOut: 5000});

		});


	})

</script>

</div>
