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
  </section>
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
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="box box-primary">
            <form action="{{route('admin.businessPost')}}" method="post">
                @csrf
            <div class="row">
                <div class="col-lg-12 offset-lg-1">
                    <div class="atbd_content_module">
                        <div class="atbd_content_module__tittle_area">
                            <div class="atbd_area_title">
                                <h4><span class="la la-user"></span>General Information</h4>
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