@extends('auththeme')


@section('title', 'Healthneutron Business')


@section('content')
      
      <div class="wrap-login100">

          @livewire('add-new-business')
        
    
        <div class="login100-more" style="background-image: url('{{ asset('../assets/images/signup-bg.png') }}');  background-size: cover ;">

          <div class="logo-wrapper"> 
            <img  id="site-logo" src="https://res.cloudinary.com/dfiu8t1if/image/upload/v1630679821/GeneralAsset/logo-transparent_yqr2if.png" alt="Health Neutron Logo">
          </div>

          <div class="signup-content-wrapper">
            
             <div style="width: 40%" class="col-mids">
          
             </div>

             <div class="col-mid">
               
               <div id="signup-intro-txt">
               
                <div> <span class="font-bold color-site-primary">Healthneutron</span></div>
                <div> <span class="font-bold color-site-primary">BUSINESS</span> </div>

               <div class="button-group-download p-t-9">

                 <div>
                    <a target="_blank" href="https://play.google.com/store/apps/details?id=com.axxendcorperation.newhealthneutron"> 
                          <img style="width:90% !important" id="site-logo" src="{{ asset('../assets/images/play-store-icon.jpg') }}" 
                          alt="Play Store">
                    </a>
                 </div>

                 <div>
                   <a target="_blank" href="https://apps.apple.com/mu/app/healthneutron/id1553826704"> 
                          <img style="width:90% !important" id="site-logo" src="{{ asset('../assets/images/apple-store.jpg') }}" 
                          alt="App Store"> 
                   </a>
                 </div>

               </div>


               </div>

             
              
             </div>

          </div>

        </div>
      </div>



    @endsection


@push('scripts')


@endpush