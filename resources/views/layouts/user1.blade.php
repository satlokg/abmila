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
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.11/css/select2.min.css" rel="stylesheet" />

    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/img/fevicon.png')}}">
    <style type="text/css">
        .row{
            margin: 0;
        }
        .col,.colsm-12{
            padding: 0;
        }
        p{
            margin: 0;
        }
    </style>
    <script src="https://use.fontawesome.com/3288af97e8.js"></script>
    <style type="text/css">
    .menu-area{
        background-color: #f5f5f5;
    }
    .menu-area.menu--light .mainmenu__menu .navbar-nav>li>a {
    color: #000;
}
.menu-area.menu--light .search-wrapper .search_module.active .search_area form .input-group .form-control {
    /* border-color: rgba(39,43,65,.1); */
    background: #fff;
    color: #272b41;
}
.menu-area.menu--light .search-wrapper .search_module .search_area form .input-group .form-control {
    color: #000;
}
.menu-area.menu--light .author__access_area ul li .access-link {
    color:red;
}
.menu-area.menu--light .author__access_area ul li>span {
    color: #000;
}
.menu-area.menu--light .search-wrapper .search_module .icon-left {
    color: #000;
}
</style>
</head>
<body>
@include('layouts.user.header1')
	@yield('content')
@include('layouts.user.footer')
 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0C5etf1GVmL_ldVAichWwFFVcDfa1y_c"></script>
<!-- inject:js-->
<script src="{{asset('public/js/plugins.min.js')}}"></script>
<script src="{{asset('public/js/script.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- endinject-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

@yield('js')
</body>

<script>
 $(document).ready(function() {
    $( "#search" ).autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: "{{url('autocomplete')}}",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    //console.log(obj.city_name);
                    return obj.keyword_name;
               }); 
 
               response(resp);
            }
        });
    },
    minLength: 1
 });
});
 
</script> 
</html>