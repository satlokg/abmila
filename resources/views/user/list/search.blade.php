@extends('layouts.user1')
 @section('css')
 
  <link rel="stylesheet" href="{{asset('public/responsiveslides.css')}}">
  <style type="text/css">
    
  </style>
 @endsection
 @section('bread')
 
 @endsection


@section('content')
<div class="container">
  <br>
  @if($add)
  <div id="wrapper">
      <ul class="rslides" id="slider1">
         @foreach($add->files as $k=>$f)
        <li>
          <a href="{{$add->url}}" target="_blank"><img src="{{url('/public/upload_file/')}}/{{$f->filepath}}" alt="" height="200"></a>
        </li>
        @endforeach
      </ul>
    </div>
@endif

</div>
<br>
<div class="container">
<!-- <div class="row">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">Sort By Location</span>
      </div>
      <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
      <div class="input-group-append">
        <button class="btn btn-primary" type="button" id="button-addon2">
        <i class="fa fa-location-arrow" aria-hidden="true"></i>
        </button>
      </div>
      <div class="input-group-append">
        <button class="btn btn-gradient btn-gradient-two" type="button" id="button-addon2">Go</button>
      </div>
    </div>
</div> -->
<div class="row no-padding">
    <div class="col-lg-3" >
        <div class="card border border-red" >
          <div class="card-header text-white" style="background-color: red;">Category</div>
          <div class="card-body"  style="padding: 0; margin: 0;">
            <ul class="list-group ">
             @foreach($cats as $c) 
             <a href="#"><li class="list-group-item">{{$c->category_name}}</li></a>
             @endforeach
        </ul>
          </div>
        </div>
    </div>

    <div class="col-md-9">
        @foreach($results as $r) 
         @php
         $a=$r->checkInquiry($r->listing->id);
         @endphp
          @if($a=='continue')
            @continue
          @endif
         
            <div class="card mb-3">
              <div class="row no-gutters border">
                <div class="col-md-3">
                  <img src="{{url('public/img/icon3.png')}}" class="card-img" alt="...">
                </div>
                <div class="col-md-6">
                  <div class="card-body">
                    <h5 class="card-title"><a href="{{route('businessdetail',['id'=>encrypt($r->listing->id, 'abmila')])}}">{{$r->listing->business_name}}</a></h5>
                    <p class="card-text">{{$r->listing->area->area_name}},{{$r->listing->area->pincode->zone->city->city_name}}</p>
                    <p>{{@$r->listing->contact->phone}}</p>
                    <p>
                    @foreach($r->getallkey($r->listing->id) as $k=>$v) 
                    <?php if($k == 4) break; ?>
                        {{$k->keyword}},
                        <a href="{{route('businessdetail',['id'=>encrypt($r->listing->id, 'abmila')])}}">View more..</a>
                    @endforeach 
                    </p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="col-md-12 row">
                  <div class="pull-right" style="color: red; margin: 10px 0 0 0;">
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                 </div>
                 <div class="col-md-12 row">
                     <p class="pull-right" style="color: green">{{$r->getday($r->listing->id)}}</p>
                  </div>
                  <div class="col-md-12 row">
                      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Get Quotes</button>
                  </div>
                  
                </div>
              </div>
              <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="background-color: red; color: white;" id="basic-addon3">Offer</span>
              </div>
              <marquee>{{$r->listing->offer}}</marquee>
            </div>
            </div>
        @endforeach 
    </div>
</div>
</div>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">Fill this form and get best deal from "{{$key}}" </h4>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
            </div>
            <div class="modal-body">
                <p></p>
                <form action="{{route('lead.user.post')}}" method="post">
                    @csrf
                    <input type="hidden" name="key" value="{{$key}}">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="number" name="phone" class="form-control" placeholder="Contact Number">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email Address">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <ul class="list">
                  <li class="list-item">Your requirement is sent to te selected relivant businesses</li>
                  <li class="list-item">Business compete with each other to get you the best deal</li>
                  <li class="list-item">You choose whichever suits you best</li>
                  <li class="list-item">Contact info sent to you by SMS/EMAIL</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('public/responsiveslides.min.js')}}"></script>
<script type="text/javascript">
    
   
    $( document ).ready(function() {
  if (document.cookie.indexOf('visited=true')){
    // load the overlay
    setTimeout(function() {
    $('#myModal').modal('show');
    }, 10000);
    
    var year = 1000*60*60*24*365;
    var expires = new Date((new Date()).valueOf() + year);
    document.cookie = "visited=true;expires=" + expires.toUTCString();

  }
}); 
</script>
 <script>
    // You can also use "$(window).load(function() {"
    $(function () {

       $("#slider1").responsiveSlides({
        maxwidth: 1080,
        maxhieght: 200,
        speed: 100
      });
     

    });
  </script>
@endsection