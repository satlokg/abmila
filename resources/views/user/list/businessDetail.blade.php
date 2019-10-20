@extends('layouts.user')
 @section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
.profile-bar{
  background-image: url(https://i.pinimg.com/originals/ae/84/18/ae8418bc8397210c37ba7fc802dbc020.jpg);
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  max-height: 100%;
  max-width: 100%;
  color: #eee;
}

.profile-bar .contents{
  background-color: rgba(0,0,0,0.65);
  padding: 5px;
}

.profile-bar .contents img{
  display: block;
  width: 70px;
  margin: auto;
  padding-top: 25px;
}

.profile-bar .contents .profile-name{
  text-align: center;
  margin: 10px 0px;
  font-size: 18px;
  font-weight: 300;
}

.profile-bar .contents .profile-description{
  text-align: center;
  margin: 10px 0px;
  font-weight: 300;
}

.profile-bar .contents .buttons{
  text-align: center;
/*  background-color: rgba(31,45,61,.7);*/
}

.profile-bar .contents .buttons ul{
  list-style: none;
  -webkit-padding-start: 0;
}

.profile-bar .contents .buttons ul li{
  display: inline-block;
  margin: 5px 20px;
  margin-top: 30px;
}

.profile-bar .contents .buttons ul li a{
  color: #eee;
  font-size: 25px;
  display: block;
  text-decoration: none;
  opacity: 0.7;
  transition: 0.2s all linear;
}

.profile-bar .contents .buttons ul li a:hover{
  opacity: 1;
  transition: 0.2s all linear;
}

.profile-bar .contents .buttons ul li a span{
  font-size: 14px;
  display: block;
}
</style>
 @endsection
 @section('bread')
 
 @endsection


@section('content')

<section class="add-listing-wrapper border-bottom section-bg section-padding-strict">
       
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="atbd_content_module">
            <div class="profile-bar">
                <div class="contents">
                    <h1 class="text-white">{{$listing->business_name}} <i class="fa fa-share-alt" aria-hidden="true"></i></h1>
                    <span class="badge badge-success">5.0</span>
                    <span class="badge badge-warning">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    </span>
                     <span class="badge badge-warning">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    </span>
                     <span class="badge badge-warning">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    </span>
                     <span class="badge badge-warning">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    </span>
                     <span class="badge badge-warning">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    </span>
                    <span class="text-white">5 Votes</span>
                    <br><br>
                    <i class="fa fa-location-arrow bold" aria-hidden="true"></i>
                    {{ $listing->address1}},
                    {{$listing->area->area_name}},
                    {{$listing->area->pincode->zone->city->city_name}}
                    <br>
                   <i class="fa fa-phone bold" aria-hidden="true"></i>
                   {{ $listing->contact->phone}}
                    <div class="buttons">
                      <ul>
                        <li>
                          <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span> Map</span></a>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-mobile" aria-hidden="true"></i><span> SMS/EMAIL</span></a>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></i><span> Write a Review</span></a>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-power-off"></i><span> Write a Review</span></a>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i><span> Edit This</span></a>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-users" aria-hidden="true"></i><span> Manage Campaign</span></a>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-whatsapp text-success" aria-hidden="true"></i><span>WhatsApp</span></a>
                        </li>
                      </ul>
                      
                    </div>
                </div>
            </div>

            <div class="atbdb_content_module_contents">
             <div class="row">
                 <div class="col-sm-4">
                     <div id="Gallery">
                          <div class="gallery-item">
                            <a href="http://abvichico.com/images/full/Exterior2.jpg"><img src="http://abvichico.com/images/thumb/Exterior2.jpg" alt="Exterior"/></a>
                          </div>
                          <div class="gallery-item">
                            <a href="http://abvichico.com/images/full/Lobby1.jpg"><img src="http://abvichico.com/images/thumb/Lobby1.jpg" alt="Lobby"/></a>
                          </div>
                          <div class="gallery-item">
                            <a href="http://abvichico.com/images/full/Guest%20Room2.jpg"><img src="http://abvichico.com/images/thumb/Guest%20Room2.jpg" alt="Guest Room"/></a>
                          </div>
                          <div class="gallery-item">
                            <a href="http://abvichico.com/images/full/Guest%20Room4.jpg"><img src="http://abvichico.com/images/thumb/Guest%20Room4.jpg" alt="Guest Room"/></a>
                          </div>
                          <div class="gallery-item">
                            <a href="http://abvichico.com/images/full/Guest%20Room6.jpg"><img src="http://abvichico.com/images/thumb/Guest%20Room6.jpg" alt="Guest Room"/></a>
                          </div>
                          <div class="gallery-item">
                            <a href="http://abvichico.com/images/full/Guest%20Room8.jpg"><img src="http://abvichico.com/images/thumb/Guest%20Room8.jpg" alt="Guest Room"/></a>
                          </div>
                          <div class="gallery-item">
                            <a href="http://abvichico.com/images/full/Guest%20Room9.jpg"><img src="http://abvichico.com/images/thumb/Guest%20Room9.jpg" alt="Guest Room"/></a>
                          </div>
                          <div class="gallery-item">
                            <a href="http://abvichico.com/images/full/Guest%20Room5.jpg"><img src="http://abvichico.com/images/thumb/Guest%20Room5.jpg" alt="Guest Room"/></a>
                          </div>
                          <div class="gallery-item">
                            <a href="http://abvichico.com/images/full/Guest%20Bathroom2.jpg"><img src="http://abvichico.com/images/thumb/Guest%20Bathroom2.jpg" alt="Guest Bathroom"/></a>
                          </div>
                          <div class="gallery-item">
                            <a href="http://abvichico.com/images/full/Pool3.jpg"><img src="http://abvichico.com/images/thumb/Pool3.jpg" alt="Pool"/></a>
                          </div>
                        </div><!--end #Gallery-->
                 </div>
                 <div class="col-sm-8"></div>
             </div>
            </div><!-- ends: .atbdb_content_module_contents -->
        </div><!-- ends: .atbd_content_module -->
    </div>
    </div><!-- ends: .col-lg-10 -->
</div>
    </section><!-- ends: .add-listing-wrapper -->
@endsection
@section('js')

@endsection