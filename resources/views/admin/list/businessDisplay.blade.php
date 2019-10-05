@extends('layouts.admin')
@section('bread')
 <section class="content-header">
      <h1>
        Business Listing
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Business Listing</li>
      </ol>
@endsection


@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Business Listing Detail</h3>
              @include('admin.list.timeline')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="col">
                <div class="col-md-8">
                  <!-- general form elements -->
                  <div class="box box-primary">
            <div class="row">
                <div class="col-lg-12 offset-lg-1">
                    <div class="atbd_content_module">
                        <div class="atbd_content_module__tittle_area">
                            <div class="atbd_area_title">
                                <h4><span class="la la-user"></span>List of Your Listings</h4>
                            </div>
                        </div>
                        <div class="atbdb_content_module_contents">
                            
                           
                                <ul class="list-group">
                                 @foreach($contact->listings as $listing)
                                  <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{$listing->business_name}}
                                    <a class="badge badge-primary badge-pill  text-white">Edit</a>
                                  </li>
                                  @endforeach
                                </ul>

                            
                        </div><!-- ends: .atbdb_content_module_contents -->
                    </div><!-- ends: .atbd_content_module -->
                </div><!-- ends: .col-lg-10 -->





     
               

              

               

              

                <div class="col-lg-10 offset-lg-1 text-center">
                   

                    <div class="btn_wrap list_submit m-top-25">
                        <form action="{{route('admin.businessPost')}}" method="post">
                        @csrf
                        <input name="general[business_name]" value="{{$list['business_name']}}"  type="hidden">
                        <input name="contactDetail[email]" type="hidden" value="{{$contactDetail['email']}}">
                        <input name="contactDetail[id]" type="hidden" value="{{$contact->id}}">
                        <input name="contactDetail[phone]" type="hidden" value="{{$contactDetail['phone']}}">

                        <button type="submit" name="submit" value="new" class="btn btn-primary btn-lg listing_submit_btn">New listing</button>
                        </form>
                    </div>
                </div><!-- ends: .col-lg-10 -->

            </div>
        </div>
    </div>
</div>
        </div>
            <!-- ./box-body -->
            
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
@endsection
@section('js')

@endsection