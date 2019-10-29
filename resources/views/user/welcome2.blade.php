 @extends('layouts.user')
 @section('css')
 @endsection
 @section('bread')
 
 @endsection


@section('content')
<section class="intro-wrapper">
<div class="directory_content_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="search_title_area">
                             <a href="#" class="logss"><img src="{{asset('public/img/logo.png')}}" alt=""></a>
                            
                        </div><!-- ends: .search_title_area -->

                        <form action="{{route('user.list')}}" method="post" class="search_form">
                          @csrf
                            <div class="atbd_seach_fields_wrapper">
                                <div class="input-group mb-3">
                              <input class="form-control" id="search" type="text" placeholder="What are you looking for?" name="key">
                              <div class="input-group-append">
                                <button type="submit" class="btn btn-block btn-gradient btn-gradient-one btn-md btn_search btmmnsearc">Search</button>
                              </div>
                            </div>
                            </div>
                        </form><!-- ends: .search_form -->
                       
                    </div><!-- ends: .col-lg-10 -->
                </div>
                    
        </div><!-- ends: .directory_search_area -->
        </div>
    </section>
@endsection
@section('js')

<script>
 $(document).ready(function() {
    $( "#search" ).autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: "{{url('autocomplete')}}",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    //console.log(obj.city_name);
                    return obj.keyword_name;
               }); 
 
               response(resp);
            }
        });
    },
    minLength: 1
 });
});
 
</script> 
@endsection