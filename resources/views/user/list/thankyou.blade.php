@extends('layouts.user')
 @section('css')
 @endsection
 @section('bread')
 
 @endsection


@section('content')

<section class="add-listing-wrapper border-bottom section-bg section-padding-strict">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="atbd_content_module">
                        <div class="atbd_content_module__tittle_area">
                            <div class="atbd_area_title">
                                
                            </div>
                        </div>
                        <div class="atbdb_content_module_contents">
                            
                               <h1 class="text-center">Thank You</h1>
                               <a href="{{url('/')}}" class="btn btn-sm btn-primary">Back To Home</a>
                            
                        </div><!-- ends: .atbdb_content_module_contents -->
                    </div><!-- ends: .atbd_content_module -->
                </div><!-- ends: .col-lg-10 -->

            </div>
        </div>
    </section><!-- ends: .add-listing-wrapper -->
@endsection
@section('js')

@endsection