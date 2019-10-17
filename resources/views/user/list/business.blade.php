@extends('layouts.user')
 @section('css')
 @endsection
 @section('bread')
 
 @endsection


@section('content')

<section class="add-listing-wrapper border-bottom section-bg section-padding-strict">
        <div class="container">
            <form action="{{route('businessPost')}}" method="post">
                @csrf
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="atbd_content_module">
                        <div class="atbd_content_module__tittle_area">
                            <div class="atbd_area_title">
                                <h4>General Information</h4>
                            </div>
                        </div>
                        <div class="atbdb_content_module_contents">
                            
                                <div class="form-group">
                                    <label for="title" class="form-label">Business Name</label>
                                    <input type="text" required="required" name="general[business_name]" class="form-control" id="title" placeholder="Enter Business Name"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="phone_number" class="form-label">Email</label>
                                    <input name="contactDetail[email]" required="required" type="text" placeholder="Email" id="phone_number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input name="contactDetail[phone]" required="required" type="text" placeholder="Phone Number" id="phone_number" class="form-control" required>
                                </div>

                            
                        </div><!-- ends: .atbdb_content_module_contents -->
                    </div><!-- ends: .atbd_content_module -->
                </div><!-- ends: .col-lg-10 -->





     
               

              

               

              

                <div class="col-lg-10 offset-lg-1 text-center">
                   

                    <div class="btn_wrap list_submit m-top-25">
                        <button type="submit" class="btn btn-primary btn-lg listing_submit_btn">Submit listing</button>
                    </div>
                </div><!-- ends: .col-lg-10 -->

            </div>
        </form>
        </div>
    </section><!-- ends: .add-listing-wrapper -->
@endsection
@section('js')

@endsection