<!DOCTYPE html>
<html dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, monster admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, " />
  <meta name="description" content="Monster is powerful and clean admin dashboard template, inpired from Google's Material Design" />
  <meta name="robots" content="noindex,nofollow" />
  <title>Admin | Panel</title>
  <link rel="canonical" href="" />
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png" />

  <link href="{{asset('public/frontend/css/custom.css')}}" rel="stylesheet" />

  <!-- Custom CSS -->
  <link href="{{asset('public/backend/dist/css/style.min.css')}}" rel="stylesheet" />
</head>

<body>
  @yield('content')
  <script src="{{asset('public/backend/dist/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('public/backend/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('public/backend/dist/js/feather.min.js') }}"></script>
  <script src="{{ asset('public/backend/dist/js/custom.min.js') }}"></script>
  <script>
    $(".preloader").fadeOut();
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $("#to-recover").on("click", function() {
      $("#loginform").slideUp();
      $("#recoverform").fadeIn();
    });
  </script>
</body>

</html>