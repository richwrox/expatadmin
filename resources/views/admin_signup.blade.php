@extends('auththeme')


@section('title', 'Healthneutron Business')


@section('content')
      <div class="wrap-login100">

          @livewire('admin-sign-up')
        
    
        <div class="login100-more" style="background-image: url('{{ asset('../assets/images/bg-cashew.jpeg') }}');  background-size: cover ;">

          <div class="logo-wrapper"> 
            <span class="font-bold text-site-primay-dark">
          <img style="width: 130px; padding-bottom: 30px;" class="text-center" src="{{ asset('../../../assets/images/cashew-logo.png') }}">
            </span>
          </div>

          <div class="signup-content-wrapper">
            
             <div style="width: 40%" class="col-mids">
          
             </div>

             <div class="col-mid">
               
               <div id="signup-intro-txt">
               
                <div> <span class="font-bold text-site-primay-dark"></span></div>
              

               <div class="button-group-download p-t-9">


               </div>


               </div>

             
              
             </div>

          </div>

        </div>
      </div>
@endsection