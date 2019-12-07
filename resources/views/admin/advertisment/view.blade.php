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
      <script type="text/javascript">

    $(document).ready(function() {

      $(".btn-add").click(function(){ 

          var lsthmtl = $(".clone").html();

          $(".increment").after(lsthmtl);

      });

      $(".box-body").on("click",".btn-danger",function(){ 

          $(this).parents(".hdtuto").remove();

      });

    });

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
               @include('admin.advertisment.timeline')
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <div class="col">
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    
                    <!-- form start -->
                    <form role="form" action="{{route('admin.advertisments.post')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="box-body">
                        
                      
                      <!-- /.box-body -->

                      <div class="form-group">
                          <label>Category</label>
                          <select onchange="populateSubCat();" id="cat" name="category_id" class="form-control select2" data-placeholder="Select a Category"
                                  style="width: 100%;">
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                            <option value="{{$cat->id}}" {{($cat->id==$banner->category_id)?'sselected':''}}>{{$cat->category_name}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Sub Category</label>
                          <select name="subcategory_id" id="subcat" class="form-control" data-placeholder="Select a Category"
                                  style="width: 100%;">

                            <optgroup id="scat">
                          
                            </optgroup>
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Select Zone</label>
                          <select name="zone_id" class="form-control select2" style="width: 100%;">
                            <option value="">Select Zone</option>
                            @foreach($zones as $zone)
                            <option value="{{$zone->id}}" {{($zone->id==$banner->zone_id)?'sselected':''}}>{{$zone->zone_name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="box-body">
                        @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
                          <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                      </div>
                      @endif
                      @if(session('success'))
                      <div class="alert alert-success">
                        {{ session('success') }}
                      </div> 
                      @endif
                      <label>Images</label>
                     <div class="input-group hdtuto control-group lst increment" >
                        <input type="file" name="filenames[]" class="myfrm form-control">
                        <div class="input-group-btn"> 
                          <button class="btn btn-success btn-add" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                        </div>
                      </div>
                      <div class="clone hide">
                        <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                          <input type="file" name="filenames[]" class="myfrm form-control">
                          <div class="input-group-btn"> 
                            <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                          </div>
                        </div>
                      </div>
                    </div>

                        <div class="form-group">
                          <label>Title</label>
                          <input type="text" name="title" value="{{$banner->title}}" class="form-control" placeholder="title">
                        </div>

                        <div class="form-group">
                          <label>Description</label>
                          <textarea name="description" class="form-control">{{$banner->description}}</textarea>
                        </div>

                        <div class="form-group">
                          <label>Url</label>
                          <input type="text" name="url" class="form-control"  value="{{$banner->url}}" placeholder="http://domain.com">
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
     