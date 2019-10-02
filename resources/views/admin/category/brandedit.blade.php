 @extends('layouts.admin')
  @section('css')
 <link rel="stylesheet" href="{{asset('public/bower_components/select2/dist/css/select2.min.css')}}">
 @endsection
 @section('bread')
 <section class="content-header">
      <h1>
Brand      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Brand</li>
        <li class="active">Add</li>
      </ol>
@endsection

@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Brand </h3>
               @include('admin.category.timeline')
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <div class="col">
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    
                    <!-- form start -->
                    <form role="form" action="{{route('admin.brand.post')}}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{$brand->id}}">
                      <input type="hidden" name="category_id" value="{{$brand->subcategory->category->id}}">
                      <input type="hidden" name="subcategory_id" value="{{$brand->subcategory->id}}">
                      <div class="box-body">
                        <div class="form-group">
                          <label>Category Name</label>
                          {{$brand->subcategory->category->category_name}}
                        </div>
                        <div class="form-group">
                          <label>Sub category name</label>
                          {{$brand->subcategory->subcategory_name}}
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Enter Brand Name</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Brand Name" required="required" name="brand_name" value="{{$brand->brand_name}}">
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
     