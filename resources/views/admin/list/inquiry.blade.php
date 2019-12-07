@extends('layouts.admin')
 @section('css')
 <link rel="stylesheet" href="{{asset('public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
 @endsection
@section('bread')
 <section class="content-header">
      <h1>
        Inquiry Details
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Inquiry Details</li>
      </ol>
@endsection


@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Inquiry Details</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="atbd_content_module">
                        <div class="atbd_content_module__tittle_area">
                            <div class="atbd_area_title">
                                <h4><span class="la la-user"></span></h4>
                            </div>
                        </div>
                        <div class="atbdb_content_module_contents">
                            
                              
                          <div class="col">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                    <th>Keyword</th>
                    <th>User Email Id</th>
                    <th>Phone No</th>
                    <th>Name</th>
                    <th>Enquiry Date and Time</th>
                    <th>Business Name</th>
                    <!-- <th>Business Email</th>
                    <th>Business Number</th> -->
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($inquiries as $inquiry)
                  <tr>
                  <td>{{$inquiry->keyword_name}}</td>
                  <td>{{$inquiry->email}}</td>
                  <td>{{$inquiry->phone}}</td>
                   <td>{{$inquiry->name}}</td>
                  <td>{{$inquiry->created_at->format('jS F Y')}}</td>
                  <td>
                      @foreach(@$inquiry->iquiry as $key=>$iq)
                      {{$key+1}}-{{@$iq->listing->business_name}}<br>
                      @endforeach
                    </td>
                 <!--  <td>{{@$inquiry->contact->email}}</td>
                  <td>{{@$inquiry->contact->phone}}</td> -->
                  
                  </tr>
                   @endforeach
                 </tbody>
                </table>
                <!-- /.col -->
              </div>
                            
                        </div><!-- ends: .atbdb_content_module_contents -->
                    </div><!-- ends: .atbd_content_module -->
                </div><!-- ends: .col-lg-10 -->

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