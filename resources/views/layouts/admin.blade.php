<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Gotta Deal Australia') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.png') }}"/>

    <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('plugins/lteadmin/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('plugins/lteadmin/_all-skins.min.css') }}" >


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    
</head>

<!-- body -->
<body class="hold-transition skin-blue sidebar-mini">
<div id="app">
<div class="wrapper">   
    <!-- header -->
    <div id="header">
        @include('layouts.admin.header')
    </div>
        <!-- sidebarmenu -->
    <div id="sidebarmenu">
        @include('layouts.admin.sidebarmenu')
    </div>
        <!-- page content -->
    <div id="page-content">
         @yield('page-content')
    </div>
        <!-- footer -->
    <div id="footer">
        @include('layouts.admin.footer')
    </div>

    <!-- gda information message -->
    @if (session('gda-info-message'))
    <div id="gda-message" style="display:none">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
        <div class="alert alert-info " style="margin-top:20px;" role="alert">
            {{ session('gda-info-message') }}
        </div>
        </div>
    </div>
    </div>
    @endif
</div>
</div>

   <script src="{{ asset('js/app.js') }}"></script> <!-- laravel default app js -->
   <script src="{{ asset('plugins/lteadmin/gda-lte-app.min.js') }}"></script> <!-- LTE admin default app js -->
    <!-- Page script -->
    @yield('child-scripts')

    <script>
        $(document).ready(function(){
            $( "#page-content .content-wrapper" ).prepend( $( "#gda-message" ).html() );
        });

    </script>

</body>
</html>
