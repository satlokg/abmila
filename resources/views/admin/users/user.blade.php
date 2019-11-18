 @extends('layouts.admin')
 @section('bread')
 <section class="content-header">
      <h1>
        Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Users</li>
      </ol>
@endsection


@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Users Detail</h3>
<div class="pull-right">
  <a href="{{route('admin.users.add')}}" class="btn btn-sm btn-info">Add User</a>
  <a href="{{route('admin.users')}}" class="btn btn-sm btn-info">List</a>

</div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                
                <!-- /.col -->
               <div class="col">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>User name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Role</th>
                    <th></th>

                  </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td>{{$user->firstname}} {{$user->lastname}}</td>
                   <td>{{$user->email}}</td>
                   <td>{{$user->address}}</td>
                   <td>
                    @if($user->role==2)
                    Co Admin
                    @else
                    Editor

                    @endif
                    </td>
                 
                  
                   
                     <td>
                     
                      <a href="{{route('admin.users.edit',['id'=>$user->id])}}" class="btn btn-info btn-sm">Edit </a>
                      <a href="{{route('admin.users.delete',['id'=>$user->id])}}" class="btn btn-info btn-sm"
                           data-tr="tr_{{$user->id}}"
                           data-toggle="confirmation"
                           data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                           data-btn-ok-class="btn btn-sm btn-danger"
                           data-btn-cancel-label="Cancel"
                           data-btn-cancel-icon="fa fa-chevron-circle-left"
                           data-btn-cancel-class="btn btn-sm btn-default"
                           data-title="Are you sure you want to delete ?"
                           data-placement="left" data-singleton="true">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>Delete </a>
                         
                    </td>
                  </tr>
                   @endforeach
                 </tbody>
                </table>
                <!-- /.col -->
              </div>
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