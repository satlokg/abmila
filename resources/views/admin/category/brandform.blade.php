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
                      <div class="box-body">
                        <div class="form-group">
                          <label>Category Name</label>
                          <select onchange="populateSubCat();" id="cat" class="form-control select2" style="width: 100%;" name="category_id" required="required">
                            <option>Select Category</option>
                            @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Sub Category </label>
                          <select class="form-control" style="width: 100%;" name="subcategory_id" required="required">
                            <optgroup id="scat">
                          
                            </optgroup>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Enter Brand Name</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Brand Name" required="required" name="brand_name">
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
     