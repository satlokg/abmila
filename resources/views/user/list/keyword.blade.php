@extends('layouts.user')
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


@section('content')
<style type="text/css">
    .select2-container--default .select2-selection--multiple .select2-selection__choice{
        background-color: #f80f0f;
    }
    .select2-container--default .select2-results__option--highlighted[aria-selected]{
        background-color: #f80f0f;
    }
</style>
<section class="add-listing-wrapper border-bottom section-bg section-padding-strict">
        <div class="container">
             <form action="{{route('finalPost')}}" method="post">
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
                       
                        <button type="submit" name="submit" value="new" class="btn btn-primary btn-lg listing_submit_btn">New listing</button>
                        
                    </div>
                </div><!-- ends: .col-lg-10 -->

            </div>
            </form>
        </div>
    </section><!-- ends: .add-listing-wrapper -->
@endsection
@section('js')

@endsection