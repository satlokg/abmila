 <div class="mainmenu-wrapper">
            
    <div class="menu-area menu1 menu--light">
        <div class="top-menu-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="menu-fullwidth">
                            <div class="logo-wrapper order-lg-0 order-sm-1">
                                <div class="logo logo-top">
                                    <a href="/"><img src="{{asset('public/img/logo.png')}}" height="50" alt="logo image"></a>
                                </div>
                            </div><!-- ends: .logo-wrapper -->
<form action="{{route('user.list')}}" method="post" class="search_form pull-right">
      @csrf
        <div class="atbd_seach_fields_wrapper">
            <div class="input-group mb-3">
          
          <input type="text" class="form-control" id="search"  placeholder="What are you looking for?" name="key">
          <input type="text" class="form-control" id="location"  placeholder="Location?" name="location">
          <div class="input-group-append">
            <button type="submit" class="btn btn-block btn-gradient btn-gradient-one btn-md btn_search btmmnsearc">Search</button>
          </div>
        </div>
        </div>
    </form><!-- ends: .search_form -->
                            
    <div class="menu-container order-lg-1 order-sm-0">
        <div class="d_menu">
            <nav class="navbar navbar-expand-lg mainmenu__menu">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#direo-navbar-collapse"
                        aria-controls="direo-navbar-collapse"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon icon-menu"><i class="la la-reorder"></i></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
               
                <!-- /.navbar-collapse -->
            </nav>
        </div>
    </div>


                            <div class="menu-right order-lg-2 order-sm-2">
                               
                                <!-- start .author-area -->
                                <div class="author-area">
                                    <div class="author__access_area">
                                        <ul class="d-flex list-unstyled align-items-center">
                                            <li>
                                                <a href="{{route('businessList')}}" class="btn btn-xs btn-gradient btn-gradient-two">
                                                    <span class="la la-plus"></span> Add Your Business
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="access-link" data-toggle="modal" data-target="#login_modal">Login</a>
                                <span>or</span>
                                <a href="#" class="access-link" data-toggle="modal" data-target="#signup_modal">Register</a>
                                                
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end .author-area -->

                                <div class="offcanvas-menu d-none">
                                    <a href="#" class="offcanvas-menu__user"><i class="la la-user"></i></a>
                                    <div class="offcanvas-menu__contents">
                                        <a href="#" class="offcanvas-menu__close"><i class="la la-times-circle"></i></a>
                                        <div class="author-avatar">
                                            <img src="img/author-avatar.png" alt="" class="rounded-circle">
                                        </div>
                                        <ul class="list-unstyled">
                                            <li><a href="dashboard-listings.html">My Profile</a></li>
                                            <li><a href="dashboard-listings.html">My Listing</a></li>
                                            <li><a href="dashboard-listings.html">Favorite Listing</a></li>
                                            <li><a href="add-listing.html">Add Listing</a></li>
                                            <li><a href="#">Logout</a></li>
                                        </ul>
                                        <div class="search_area">
                                            <form action="http://aazztech.com/">
                                                <div class="input-group input-group-light">
                                                    <input type="text" class="form-control search_field" placeholder="Search here..." autocomplete="off">
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-secondary">Search</button>
                                            </form>
                                        </div><!-- ends: .search_area -->
                                    </div><!-- ends: .author-info -->
                                </div><!-- ends: .offcanvas-menu -->
                            </div><!-- ends: .menu-right -->
                        </div>
                    </div>
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end  -->
    </div>

        </div><!-- ends: .mainmenu-wrapper -->