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
              <h3 class="box-title">Category Detail</h3>
              <a href="{{route('admin.keyword.add')}}" class="btn btn-sm btn-success">Add Keyword</a>
              @include('admin.keyword.timeline')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- /.col -->
                <div class="col">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Category</th>
                    <th>Keyword Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($keywords as $keyword)
                  <tr>
                    <td>{{$keyword->category->category_name}}</td>
                    <td>{{$keyword->keyword_name}}</td>

                    <td></td>
                  </tr>
                   @endforeach
                 </tbody>
                </table>
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