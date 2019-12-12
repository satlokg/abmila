 @extends('layouts.admin')
  @section('css')
  <link rel="stylesheet" href="{{asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
 @endsection
 @section('bread')
 <section class="content-header">
      <h1>
Page      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Page</li>
        <li class="active">Add</li>
      </ol>
@endsection

@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Page </h3>
               @include('admin.page.timeline')
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <div class="col">
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    
                    <!-- form start -->
                    <form role="form" action="{{route('admin.page.post')}}" method="post">
                      @csrf
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Enter Page Name</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name" required="required" name="slug">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Enter Page Ttile</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name" required="required" name="page_title">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Page Description</label>
                          <textarea id="editor1" name="description" rows="10" cols="80"> </textarea>
                        </div>

                        <!-- checkbox -->
                            <div class="form-group">
                              <label>
                                <input type="checkbox" name="header" value="1" class="minimal" >
                              </label>
                              <label>
                                Show In Header
                              </label>
                               <label>
                                <input type="checkbox" name="footer" value="1" class="minimal" >
                              </label>
                              <label>
                                Show In Footer
                              </label>
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
     <script src="{{asset('public/bower_components/ckeditor/ckeditor.js')}}"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="{{asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
      <script>
        $(function () {
          // Replace the <textarea id="editor1"> with a CKEditor
          // instance, using default configuration.
          CKEDITOR.replace('editor1')
          //bootstrap WYSIHTML5 - text editor
          $('.textarea').wysihtml5()
        })
      </script>
      @endsection

