@extends('layouts.user1')
 @section('css')
 @endsection
 @section('bread')
 
 @endsection


@section('content')
<div class="container">
<div class="row">
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
</div>
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
            <div class="card mb-3">
              <div class="row no-gutters border">
                <div class="col-md-3">
                  <img src="{{url('public/img/icon3.png')}}" class="card-img" alt="...">
                </div>
                <div class="col-md-6">
                  <div class="card-body">
                    <h5 class="card-title"><a href="#">{{$r->listing->business_name}}</a></h5>
                    <p class="card-text">{{$r->listing->area->area_name}},{{$r->listing->area->pincode->zone->city->city_name}}</p>
                    <p>{{$r->listing->contact->phone}}</p>
                    <p>{{$r->listing->contact->email}}</p>
                    <p>
                    @foreach($r->getallkey($r->listing->id) as $k) 
                        {{$k->keyword}},
                    @endforeach 
                    </p>
                  </div>
                </div>
                <div class="col-md-3">
                  <img src="{{url('public/img/icon3.png')}}" class="card-img" alt="...">
                </div>
              </div>
              <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="background-color: red; color: white;" id="basic-addon3">Offer</span>
              </div>
              <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
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
                
                <h4 class="modal-title">Subscribe </h4>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
            </div>
            <div class="modal-body">
                <p></p>
                <form action="{{route('lead.user.post')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="number" name="phone" class="form-control" placeholder="Contact Number">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email Address">
                    </div>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
@endsection