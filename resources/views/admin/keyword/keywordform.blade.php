 @extends('layouts.admin')
  @section('css')
<link rel="stylesheet" href="{{asset('public/bower_components/select2/dist/css/select2.min.css')}}">
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
 @section('bread')
 <section class="content-header">
      <h1>
Keywords      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Keywords</li>
        <li class="active">Add</li>
      </ol>
@endsection

@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Keyword </h3>
               @include('admin.keyword.timeline')
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <div class="col">
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    
                    <!-- form start -->
                    <form role="form" action="{{route('admin.keyword.post')}}" method="post">
                      @csrf
                      <div class="box-body">
                        
                      
                      <!-- /.box-body -->

                      <div class="form-group">
                          <label>Category</label>
                          <select onchange="populateSubCat();" id="cat" name="category_id" class="form-control select2" data-placeholder="Select a Category"
                                  style="width: 100%;">
                            @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Sub Category</label>
                          <select onchange="populateService();" name="subcategory_name" id="subcat" class="form-control" data-placeholder="Select a Category"
                                  style="width: 100%;">
                            <optgroup id="scat">
                          
                            </optgroup>
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Service</label>
                          <select name="service_name" class="form-control" data-placeholder="Select a Category"
                                  style="width: 100%;">
                            <optgroup id="srv">
                          
                            </optgroup>
                            
                          </select>
                        </div>

                      <div class="form-group">
                          <label>Brand</label>
                          <select name="brand_name[]" class="form-control select2" multiple="multiple" data-placeholder="Select Key"
                                  style="width: 100%;">
                            @foreach($brands as $brand)
                            <option>{{$brand->brand_name}}</option>
                            @endforeach
                          </select>
                        </div>
                        </div>
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
     