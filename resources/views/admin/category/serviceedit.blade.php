 @extends('layouts.admin')
  @section('css')
 <link rel="stylesheet" href="{{asset('public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
 @endsection
 @section('bread')
 <section class="content-header">
      <h1>
Service      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Service</li>
        <li class="active">Add</li>
      </ol>
@endsection

@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Service </h3>
               @include('admin.category.timeline')
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <div class="col">
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    
                    <!-- form start -->
                    <form role="form" action="{{route('admin.service.post')}}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{$service->id}}">
                      <input type="hidden" name="category_id" value="{{$service->subcategory->category->id}}">
                      <input type="hidden" name="subcategory_id" value="{{$service->subcategory->id}}">
                      <div class="box-body">
                        <div class="form-group">
                          <label>Category Name</label>
                          {{$service->subcategory->category->category_name}}
                        </div>
                        <div class="form-group">
                          <label>Sub category name</label>
                          {{$service->subcategory->subcategory_name}}
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Enter Service Name</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Service Name" required="required" name="service_name" value="{{$service->service_name}}">
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
     