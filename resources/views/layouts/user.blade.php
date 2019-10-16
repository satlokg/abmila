<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Abmila</title>
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,600,700" rel="stylesheet">
     <link rel="stylesheet" href="{{asset('public/css/plugin.min.css')}}">
     <link rel="stylesheet" href="{{asset('public/style.css')}}">
    <!-- inject:css-->
    @yield('css')
    <!-- endinject -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  
<script type="text/javascript">
       var SITE_URL = {!! json_encode(url('/')) !!}      
    </script>

    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/img/fevicon.png')}}">
</head>
<body>
@include('layouts.user.header')


	@yield('content')

@include('layouts.user.footer')
 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0C5etf1GVmL_ldVAichWwFFVcDfa1y_c"></script>
<!-- inject:js-->
<script src="{{asset('public/js/plugins.min.js')}}"></script>
<script src="{{asset('public/js/script.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- endinject-->
@yield('js')
</body>


</html>