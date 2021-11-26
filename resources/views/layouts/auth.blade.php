<!--
=========================================================
Material Dashboard PRO - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard-pro
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard PRO by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
    <link href="{{asset('/css/material-dashboard.css')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('/css/demo.css')}}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
</head>

<body class="off-canvas-sidebar">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
    <div class="container">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="/">Market</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
            <li class="nav-item  active ">
                <a href="{{route('user.login')}}" class="nav-link">
                    <i class="material-icons">fingerprint</i>
                    Login
                </a>
            </li>
            <li class="nav-item ">
            <a href="{{route('user.register')}}" class="nav-link">
              <i class="material-icons">person_add</i>
              Register
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
 @yield('content')
  <!--   Core JS Files   -->
  <script src="{{asset('/js/jquery.min.js')}}"></script>
  <script src="{{asset('/js/popper.min.js')}}"></script>
  <script src="{{asset('/js/bootstrap-material-design.min.js')}}"></script>
  <script src="{{asset('/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>

  <script src="{{asset('/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{asset('/js/plugins/bootstrap-selectpicker.js')}}"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{asset('/js/plugins/jasny-bootstrap.min.js')}}"></script>
  <!-- Library for adding dinamically elements -->
  <script src="{{asset('/js/plugins/arrive.min.js')}}"></script>

  <!-- Chartist JS -->
  <script src="{{asset('/js/plugins/chartist.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('/js/material-dashboard.js')}}?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('demo/demo.js')}}"></script>
  <script src="{{asset('js/demo/login1.js')}}"></script>
<script src="{{asset('js/demo/login2.js')}}"></script>
</body>

</html>
