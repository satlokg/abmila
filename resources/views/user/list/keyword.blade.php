@extends('layouts.user')
  @section('css')
<link rel="stylesheet" href="{{asset('public/bower_components/select2/dist/css/select2.min.css')}}">
<link href="{{ asset('public/css/fSelect.css') }}" rel="stylesheet">
<style type="text/css">
  .fs-wrap{
    width: 100%;
    border:1px selid red;
  }
  .fs-dropdown{
    width: 90%;
    border:1px selid red;
  }
</style>
 @endsection
 @section('js')
      <script src="{{asset('public/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
      <script src="{{ asset('public/js/fSelect.js') }}"></script>
      <script>
         $(function () {
        //Initialize Select2 Elements
          $('.select2').select2()
         })
      </script>
      <script type="text/javascript">
$(document).ready(function(){
 function findkey(){
  var cat = $('#ad_city').find(":selected").val();
  var id= document.getElementById('list').value;
 var action = "getCategory";
          var url = SITE_URL+"/business-keyword/"+id+"/"+cat;
          window.location=url;
          // $.ajax({
          //       method: 'get',
          //       url: url,
          //       dataType:'html',
          //       success: function(response){
          //        $('#cat').append(response);
          //           console.log(response);
          //       },
          //       error: function(data){
          //           console.log(data);
          //           //alert("fail" + ' ' + this.data)
          //       },
          //   });
 }
    $("#ad_city").on("change", findkey);
  });
</script>
<script>
(function($) {
    $(function() {
        window.fs_test = $('.test').fSelect();
    });
})(jQuery);
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
                                <h4>Select Keyword For your Business</h4>
                            </div>
                        </div>
                        <div class="atbdb_content_module_contents">
                            <input type="hidden" name="listing_id" id="list" value="{{$listing_id}}">
                            <div class="form-group">
                                    <label for="ad_city" class="form-label">Select Category</label>
                                    <div class="select-basic">
                                        <select name="category_id" required="required" class="city form-control" id="ad_city">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option  {{($cat_id==$category->id)?'selected':''}} value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                   </div>
                                </div>
                           <div class="form-group" >
                                   <select name="keys[]" class="form-control test" multiple="multiple" data-placeholder="Select Key" style="width: 100%;" id="cat">
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
    </section><!-- ends: .add-listing-wrapper -->
@endsection
