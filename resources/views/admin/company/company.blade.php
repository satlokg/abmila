 @extends('layouts.admin')
 @section('css')
 <link rel="stylesheet" href="{{asset('public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
 @endsection
 @section('bread')
 <section class="content-header">
      <h1>
        Lead MAnagement
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Lead MAnagement</li>
      </ol>
    </section>
@endsection


@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Lead Detail</h3>
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
                    <th>Business Id</th>
                    <th>Business Name</th>
                    <th>Contact No</th>
                    <th>Email Id</th>
                    <th>City</th>
                    <th>Registration Date</th>
                    <th></th>

                  </tr>
                  </thead>
                  <tbody>
                  @foreach($businesses as $business)
                  <tr>
                    <td>{{base64_encode($business->id)}}</td>
                   <td>{{$business->business_name}}</td>
                   <td>{{$business->contact->phone}}</td>
                   <td>{{$business->contact->email}}</td>
                   <td>{{@$business->area->pincode->zone->city->city_name}}</td>
                   <td>{{$business->created_at}}</td>
                  
                   
                     <td>
                      @if($status==1)
                      <a href="{{route('admin.business',['id'=>$business->id])}}" class="btn btn-info btn-sm">View </a>
                      <a href="{{route('admin.company.edit',['id'=>$business->id])}}" class="btn btn-info btn-sm">Edit </a>
                      <a href="{{route('admin.company.delete',['id'=>$business->id])}}" class="btn btn-info btn-sm"
                           data-tr="tr_{{$business->id}}"
                           data-toggle="confirmation"
                           data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                           data-btn-ok-class="btn btn-sm btn-danger"
                           data-btn-cancel-label="Cancel"
                           data-btn-cancel-icon="fa fa-chevron-circle-left"
                           data-btn-cancel-class="btn btn-sm btn-default"
                           data-title="Are you sure you want to delete ?"
                           data-placement="left" data-singleton="true">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>Delete </a>
                            @endif
                    </td>
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