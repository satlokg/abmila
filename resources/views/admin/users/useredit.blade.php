 @extends('layouts.admin')
  @section('css')
 <link rel="stylesheet" href="{{asset('public/bower_components/select2/dist/css/select2.min.css')}}">
 @endsection
 @section('bread')
 <section class="content-header">
      <h1>
User      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">User</li>
        <li class="active">Add</li>
      </ol>
@endsection

@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add New User </h3>
              <div class="pull-right">
  <a href="{{route('admin.users.add')}}" class="btn btn-sm btn-info">Add User</a>
  <a href="{{route('admin.users')}}" class="btn btn-sm btn-info">List</a>

</div>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <div class="col">
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    
                    <!-- form start -->
                    <form role="form" action="{{route('admin.users.post')}}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{$user->id}}">
                      <div class="box-body">
                        <div class="form-group">
                          <label>Select Pincode</label>
                          <select class="form-control select2" style="width: 100%;" name="role" required="required">
                            
                            <!-- <option value="1">Super Admin</option> -->
                            <option value="2" {{($user->role==2)?'selected':''}}>Co Admin</option>
                            <option value="3" {{($user->role==3)?'selected':''}}>Editor</option>
                            
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Enter User's First name</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter First name" required="required" name="firstname" value="{{$user->firstname}}">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Enter User's Last name</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Last name" required="required" name="lastname" value="{{$user->lastname}}">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Enter User's Email</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required="required" name="email" value="{{$user->email}}">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Enter User's Password</label>
                          <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password" name="password" >
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Enter User's Address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter address" required="required" name="address" value="{{$user->address}}">
                        </div>

                      </div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->


                </div>

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
      <script src="{{asset('public/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
      <script>
         $(function () {
        //Initialize Select2 Elements
          $('.select2').select2()
         })
      </script>
      @endsection
     