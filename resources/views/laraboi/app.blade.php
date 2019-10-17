<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <meta name="description" content="Laraboi">
     <meta name="author" content="NicoAudy">

     <!-- Favicon -->
     <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

     <title>{{ env('APP_NAME', 'Laraboi')}}</title>

     <!-- vendor css -->
     <link href="{{ asset('lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
     <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

     <!-- DashForge CSS -->
     <link rel="stylesheet" href="{{ asset('assets/css/dashforge.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/dashforge.auth.css') }}">

     <link id="dfMode" rel="stylesheet" href="{{ asset('assets/css/skin.light.css') }}">
</head>

<body>

     @include('laraboi.partials.header')

     <div id="app">
          <div class="content content-fixed">
               @yield('content')
          </div>
     </div>

     <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
     <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
     <script src="{{ asset('lib/feather-icons/feather.min.js') }}"></script>
     <script src="{{ asset('lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

     <script src="{{ asset('assets/js/dashforge.js') }}"></script>

     <!-- append theme customizer -->
     <script src="{{ asset('lib/js-cookie/js.cookie.js') }}"></script>
     <script src="{{ asset('assets/js/dashforge.settings.js') }}"></script>

</body>

</html>