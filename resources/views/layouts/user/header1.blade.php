<div class="row" style="margin: 0; background-color: #f5f5f5;">
    <div class="col-sm-12" style="padding: 0">
        <a href="{{route('businessList')}}" class="btn btn-xs btn-gradient btn-gradient-two pull-right">
            <span class="la la-plus"></span> Add Your Business
        </a>
    </div>
<div class="col-sm-3">
    <div class="logo logo-top">
       <a href="{{url('/')}}"><img src="{{asset('public/img/logo.png')}}" height="50" alt="logo image"></a>
    </div>
</div>
<div class="col-sm-6">
    <form action="{{route('user.list')}}" method="post" class="search_form">
      @csrf
        <div class="atbd_seach_fields_wrapper">
            <div class="input-group mb-3">
          <input class="form-control" id="search" type="text" placeholder="What are you looking for?" name="key">
          <div class="input-group-append">
            <button type="submit" class="btn btn-block btn-gradient btn-gradient-one btn-md btn_search btmmnsearc">Search</button>
          </div>
        </div>
        </div>
    </form><!-- ends: .search_form -->
</div>
<div class="col-sm-3">
    <div class="author__access_area ">
     <li class="pull-right" style="list-style: none;">
        <a href="#" class="access-link" data-toggle="modal" data-target="#login_modal">Login</a>
        <span>or</span>
        <a href="#" class="access-link" data-toggle="modal" data-target="#signup_modal">Register</a>
     </li>
    </div>
</div>
</div>
<!-- <div class="col" style="padding: 0">
<div class="menu-area menu1 menu--light">
 <div class="top-menu-area">
    <div class="menu-fullwidth">
    <div class="menu-container order-lg-1 order-sm-0">
        <div class="d_menu">
            <nav class="navbar navbar-expand-lg mainmenu__menu">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#direo-navbar-collapse"
                        aria-controls="direo-navbar-collapse"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon icon-menu"><i class="la la-reorder"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="direo-navbar-collapse">
                    <ul class="navbar-nav">
                        <li>
                            <a href="index.html">Delhi</a>
                        </li>
                        <li class="dropdown has_dropdown">
                            <a href="#" class="dropdown-toggle" id="drop3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mumbai</a>
                           
                        </li>
                        <li class="dropdown has_dropdown">
                            <a href="#" class="dropdown-toggle" id="drop4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chennai</a>
                            
                        </li>
                        <li class="dropdown has_dropdown">
                            <a class="dropdown-toggle" href="#" id="drop2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hydrabad
                            </a>
                            
                        </li>
                        <li>
                            <a href="#">Jaipur</a>
                        </li>
                        <li>
                            <a href="#">Rajsthan</a>
                        </li>
                        <li>
                            <a href="#">Kolkata</a>
                        </li>
                        <li>
                            <a href="#">Surat</a>
                        </li>
                    </ul>
                </div>
                
            </nav>
        </div>
    </div>
</div>
</div>
</div>
</div> -->
<!-- banner -->
