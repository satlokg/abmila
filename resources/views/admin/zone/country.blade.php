 @extends('layouts.admin')
  @section('css')
 <link rel="stylesheet" href="{{asset('public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
 @endsection
 @section('bread')
 <section class="content-header">
      <h1>
Country      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Country</li>
      </ol>
@endsection


@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Country Detail</h3>
              <a href="{{route('admin.country.add')}}" class="btn btn-sm btn-success">Add Country</a>
               @include('admin.zone.timeline')
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <div class="col"></div>
              <div class="col">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Country Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($countries as $country)
                <tr>
                  <td>{{$country->name}}</td>
                  <td>
                    <a href="{{route('admin.country.edit',['id'=>$country->id])}}"><i class="fa fa-pencil-square-o text-default" aria-hidden="true"></i></a>
                   
                  </td>
                </tr>
                 @endforeach
               </tbody>
              </table>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              
              <!-- /.row -->
            </div>
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