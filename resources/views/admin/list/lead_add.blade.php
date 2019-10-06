 @extends('layouts.admin')
 @section('css')
 <link rel="stylesheet" href="{{asset('public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
 @endsection
 @section('bread')
 <section class="content-header">
      <h1>
        Keyword
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Keyword</li>
      </ol>
@endsection


@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Listing Detail</h3>
              @include('admin.list.timeline')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- /.col -->
                <div class="col">
                <div class="row">
                  <div class="col-md-6">
                  <!-- general form elements -->
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Listing Details </h3>
                      </div>
                      <ul class="list-group">
                          <li class="list-group-item">{{$business->business_name}}</li>
                          <li class="list-group-item">{{$business->address1}}</li>
                          <li class="list-group-item">{{$business->address2}}</li>
                          <li class="list-group-item">{{$business->landmark}}</li>
                          <li class="list-group-item">{{$business->area->pincode->zone->city->city_name}}</li>
                          <li class="list-group-item">{{$business->area->area_name}}</li>
                          <li class="list-group-item">{{$business->area->pincode->pincode}}</li>
                          <li class="list-group-item">{{$business->state_id}}</li>
                          <li class="list-group-item">{{$business->country_id}}</li>
                        </ul>
                    </div>
                  </div>

                  <div class="col-md-6">
                  <!-- general form elements -->
                    <div class="box box-primary">
                       <div class="box-header with-border">
                        <h3 class="box-title">Manage Lead </h3>
                      </div>
                           <form action="{{route('admin.lead.post')}}" method="post">
                            @csrf
                               <div class="form-group">
                                    <input type="hidden" name="listing_id" value="{{$business->id}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number" class="form-label">Enter lead per day</label>
                                    <input name="lead" required="required" type="text" class="form-control" required value="{{@$business->lead->lead}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number" class="form-label">Enter amount per lead</label>
                                    <input name="amount" required="required" type="text" class="form-control" value="{{@$business->lead->amount}}">
                                </div>
                                <div class="col-lg-10 offset-lg-1 text-center">
                   

                                  <div class="btn_wrap list_submit m-top-25">
                                      <button type="submit" class="btn btn-primary btn-sm listing_submit_btn">Submit Lead</button>
                                  </div>
                              </form>


                    </div>
                  </div>
                  
                </div>
                <!-- /.col -->
              </div>
                <!-- /.col -->
            </div>
            <!-- ./box-body -->
            
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

   
      <!-- /.row -->
      @endsection
      @section('js')
      <script src="{{asset('public/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
      <script>
          $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
              'paging'      : true,
              'lengthChange': false,
              'searching'   : false,
              'ordering'    : true,
              'info'        : true,
              'autoWidth'   : false
            })
          })
        </script>
      @endsection