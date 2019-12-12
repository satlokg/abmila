 @extends('layouts.admin')
 @section('css')
 <link rel="stylesheet" href="{{asset('public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
 @endsection
 @section('bread')
 <section class="content-header">
      <h1>
        Page
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Page</li>
      </ol>
@endsection


@section('content')
@if (session('success'))
              <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                   <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                       {{ session('success') }}
                   </div>
                   </div>
                </div>
                @endif
      @if (session('unsuccess'))
              <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                   <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                       {{ session('unsuccess') }}
                   </div>
                   </div>
                </div>
                @endif
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Page Detail</h3>
              <a href="{{route('admin.page.add')}}" class="btn btn-sm btn-success">Add Page</a>
              @include('admin.page.timeline')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- /.col -->
                <div class="col">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Page Slug</th>
                    <th>Page Title</th>
                    <th>Page Description</th>
                    <th>Page Location</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($pages as $page)
                  <tr>
                    <td>{{$page->slug}}</td>
                    <td>{{$page->page_title}}</td>
                    <td>{!! $page->description !!}</td>
                    <td>
                      @if($page->header==1)
                      Header
                      @endif
                      -
                      @if($page->footer==1)
                      Footer
                      @endif

                    </td>
                    <td>
                      <a href="{{route('admin.pageEdit',['id'=>$page->id])}}" class="btn btn-sm btn-success">Edit</a>&nbsp;&nbsp;<a href="JavaScript:void(0);" onclick="delete_page('{{ $page->id }}');" class="btn btn-sm btn-danger">Delete</a></td>
                  </tr>
                   @endforeach
                 </tbody>
                </table>
                <!-- /.col -->
              </div>
                <!-- /.col -->
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
      <script>
            function delete_page(id){
                swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this data!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    swal("Successfully! data has been deleted!", {
                      icon: "success",
                    });
                    var url_path = "{{ route('admin.pageDelete') }}";
                      var dataString = 'id=' + id;
                                          //alert(id);
                          $.ajax({
                            type: "POST",
                            url: url_path,
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: dataString,
                            cache: false,
                           
                            success: function (data) {
                                    location.reload();

                              },
                            
                          });
                  }
                });
              }
        </script>
      @endsection