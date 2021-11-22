<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>{{ config('app.name', 'HealthNeutron') }}</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="authassets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="authassets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="authassets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="authassets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="authassets/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="authassets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="authassets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="authassets/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="authassets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="authassets/css/util.css">
  <link rel="stylesheet" type="text/css" href="authassets/css/main.css">
  <link rel="shortcut icon" href="{{ asset('../../../assets/images/favi.png') }}" />

  <!-- Layout styles -->  
    <link rel="stylesheet" href="{{ asset('../../../assets/css/demo_1/style.css') }}">
    <link rel="stylesheet" href="{{ asset('../../../assets/css/global.css') }}">
<!--===============================================================================================-->

 
@livewireStyles

 <link rel="stylesheet" href="{{ asset('../../../assets/css/toastr.min.css') }}">
 
</head>


<body style="background-color: #666666;">
  
  <div class="limiter">
    
    <div class="container-login100">
      
        @yield('content')

    </div>


  </div>
  
  

  
  
<!--===============================================================================================-->
  <script src="authassets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="authassets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="authassets/vendor/bootstrap/js/popper.js"></script>
  <script src="authassets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="authassets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="authassets/vendor/daterangepicker/moment.min.js"></script>
  <script src="authassets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="authassets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <!-- <script src="authassets/js/main.js"></script> -->

  @livewireScripts

  <script src="{{ asset('../../../assets/js/toastr.min.js') }}"></script>
</body>
</html>