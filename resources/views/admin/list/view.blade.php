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
                        <h3 class="box-title">Contact Details </h3>
                      </div>
                      <ul class="list-group">
                          <li class="list-group-item">{{$business->contact->p_name}}</li>
                          <li class="list-group-item">{{$business->contact->desidnation}}</li>
                          <li class="list-group-item">{{$business->contact->email}}</li>
                          <li class="list-group-item">{{$business->contact->phone}}</li>
                          <li class="list-group-item">{{$business->contact->landline}}</li>
                          <li class="list-group-item">{{$business->contact->fax}}</li>
                        </ul>
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