 @extends('layouts.user')
 @section('css')
 @endsection
 @section('bread')
 
 @endsection


@section('content')
<section class="intro-wrapper">
<div class="directory_content_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="search_title_area">
                             <a href="#" class="logss"><img src="{{asset('public/img/logoss.png')}}" alt=""></a>
                            
                        </div><!-- ends: .search_title_area -->

                        <form action="#" class="search_form">
                            <div class="atbd_seach_fields_wrapper">
                                <div class="input-group mb-3">
                              <input class="form-control search_fields" type="text" placeholder="What are you looking for?">
                              <div class="input-group-append">
                                <button type="submit" class="btn btn-block btn-gradient btn-gradient-one btn-md btn_search btmmnsearc">Search</button>
                              </div>
                            </div>
                            </div>
                        </form><!-- ends: .search_form -->
                       
                    </div><!-- ends: .col-lg-10 -->
                </div>
                    
        </div><!-- ends: .directory_search_area -->
        </div>
    </section>
@endsection
@section('js')

@endsection