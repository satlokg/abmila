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
        Business Listing
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Business Listing</li>
      </ol>
@endsection


@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Business Listing Detail</h3>
              <a href="{{route('admin.keyword.add')}}" class="btn btn-sm btn-success">Add Business Listing</a>
              @include('admin.list.timeline')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col">
                <div class="col-md-8">
                  <!-- general form elements -->
                  <div class="box box-primary">
             <form action="{{route('admin.finalPost')}}" method="post">
                        @csrf
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="atbd_content_module">
                        <div class="atbd_content_module__tittle_area">
                            <div class="atbd_area_title">
                                <h4><span class="la la-user"></span>Select Keyword For your Business</h4>
                            </div>
                        </div>
                        <div class="atbdb_content_module_contents">
                            <input type="hidden" name="listing_id" value="{{$listing_id}}">
                           <div class="form-group">
                                   <select name="keys[]" class="form-control select2" multiple="multiple" data-placeholder="Select Key" style="width: 100%;">
                                    @foreach($keys as $key)
                                    <option>{{$key->keyword_name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                               

                            
                        </div><!-- ends: .atbdb_content_module_contents -->
                    </div><!-- ends: .atbd_content_module -->
                </div><!-- ends: .col-lg-10 -->

                <div class="col-lg-10 offset-lg-1 text-center">
                   

                    <div class="btn_wrap list_submit m-top-25">
                       
                        <button type="submit" name="submit" class="btn btn-primary btn-lg listing_submit_btn">Submit</button>
                        
                    </div>
                </div><!-- ends: .col-lg-10 -->

            </div>
            </form>
        </div>
            <!-- ./box-body -->
            </div>
          </div>
        </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
@endsection
@section('js')

@endsection