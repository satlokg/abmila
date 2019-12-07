 @extends('layouts.admin')
 @section('css')
 <link rel="stylesheet" href="{{asset('public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
 @endsection
 @section('bread')
 <section class="content-header">
      <h1>
        Distribution MAnagement
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Distribution MAnagement</li>
      </ol>
    </section>
@endsection


@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Distribution Detail</h3>
              <div class="pull-right">
              <a href="{{route('admin.company',['status'=>'approved'])}}" class="btn btn-sm btn-info">Approved</a>
              <a href="{{route('admin.company',['status'=>'rejected'])}}" class="btn btn-sm btn-info">Rejected</a>

            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- /.col -->
                <div class="col">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Keyword</th>
                    <th>Name</th>
                    <th>Phone No</th>
                    <th>User's Email Id</th>
                    <th>Inquiry Date</th>
                    <th>Lead Cost</th>

                  </tr>
                  </thead>
                  <tbody>
                  @foreach($leads as $key=>$lead)
                  <tr>
                    <td>{{$key+1}}</td>
                   <td>{{$lead->keyword_name}}</td>
                   <td>{{$lead->name}}</td>
                   <td>{{$lead->phone}}</td>
                   <td>{{$lead->email}}</td>
                   <td>{{$lead->created_at}}</td>
                   <td>{{$lead->cost}}</td>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/mistic100-Bootstrap-Confirmation/2.4.4/bootstrap-confirmation.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'GET',
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });
</script>
      @endsection