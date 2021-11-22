<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Healthneutron Business</title>
  
  <link rel="stylesheet" href="../../../assets/vendors/core/core.css">
 
  <link rel="stylesheet" href="../../../assets/fonts/feather-font/css/iconfont.css">
  <link rel="stylesheet" href="../../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
   
  <link rel="stylesheet" href="../../../assets/css/demo_1/style.css">
  
  <link rel="shortcut icon" href="../../../assets/images/favicon.png" />

  @livewireStyles
  <link rel="stylesheet" href="{{ asset('../../../assets/css/toastr.min.css') }}">
</head>
<body>
  <div class="main-wrapper">
    <div class="page-wrapper full-page">
      <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mx-0 auth-page">
          <div class="col-md-8 col-xl-6 mx-auto">
            <div class="card">
              <div class="row">
                <div class="col-md-4 pr-md-0">
                  <div class="auth-left-wrapper">

                  </div>
                </div>
                <div class="col-md-8 pl-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo d-block mb-2">HEALTHNEUTRON <span>BUSINESS</span></a>
                    <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
                    @livewire('user-sigin')
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  
  <script src="../../../assets/vendors/core/core.js"></script>
 
  <script src="../../../assets/vendors/feather-icons/feather.min.js"></script>
  <script src="../../../assets/js/template.js"></script>
  <@livewireScripts

  <script src="{{ asset('../../../assets/js/toastr.min.js') }}"></script>
</body>
</html>