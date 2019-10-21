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
                    <h1 class="text-white">{{$listing->business_name}} </h1>
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
                           @php $rating = 1.6; @endphp  

            @foreach(range(1,5) as $i)
                <span class="fa-stack" style="width:1em">
                    <i class="far fa-star fa-stack-1x"></i>

                    @if($rating >0)
                        @if($rating >0.5)
                            <i class="fas fa-star fa-stack-1x"></i>
                        @else
                            <i class="fas fa-star-half fa-stack-1x"></i>
                        @endif
                    @endif
                    @php $rating--; @endphp
                </span>
            @endforeach
                          <a href="#"><span> Write a Review</span></a>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i><span> Edit This</span></a>
                        </li>
                       
                      </ul>
                      
                    </div>
                </div>
            </div>

            <div class="atbdb_content_module_contents">
             <div class="row">
                 <div class="col-sm-4">
                     <div class="widget atbd_widget widget-card">
        <div class="atbd_widget_title">
            <h4><span class="la la-clock-o"></span> Business Hours</h4>
            <span class="badge badge-success">Open Now</span>
        </div><!-- ends: .atbd_widget_title -->
        <div class="directory_open_hours">
            <ul>
                <li class="atbd_open atbd_today">
                    <span class="day">Monday</span>
                    <div class="atbd_open_close_time">
                        <span class="time">10:00 am</span> - <span class="time">06:00 pm</span>
                    </div>
                </li>
                <li class="atbd_open ">
                    <span class="day">Tuesday</span>
                    <div class="atbd_open_close_time">
                        <span class="time">10:00 am</span> - <span class="time">06:30 pm</span>
                    </div>
                </li>
                <li class="atbd_open">
                    <span class="day">Wednesday</span>
                    <div class="atbd_open_close_time">
                        <span class="time">09:00 am</span> - <span class="time">05:00 pm</span>
                    </div>
                </li>
                <li class="atbd_open">
                    <span class="day">Thursday</span>
                    <div class="atbd_open_close_time">
                        <span class="time">10:00 am</span> - <span class="time">07:00 pm</span>
                    </div>
                </li>
                <li class="atbd_open">
                    <span class="day">Friday</span>
                    <div class="atbd_open_close_time">
                        <span class="time">11:00 am</span> - <span class="time">06:00 pm</span>
                    </div>
                </li>
                <li class="atbd_closed">
                    <span class="day">Saturday</span>
                    <span>Closed</span>
                </li>
                <li class="atbd_closed">
                    <span class="day">Sunday</span>
                    <span>Closed</span>
                </li>
            </ul>
        </div>
    </div><!-- ends: .widget -->
                 </div>
                 <div class="col-sm-8">
                   <section id="tabs" class="project-tab">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">WRITE A REVIEW</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">REVIEWS & RATINGS</a>
                               
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="atbd_content_module atbd_review_form">
        <div class="atbd_content_module__tittle_area">
            <div class="atbd_area_title">
                <h4><span class="la la-star"></span>Add a Review</h4>
            </div>
        </div>
        <div class="atbdb_content_module_contents atbd_give_review_area">
            <div class="atbd_notice alert alert-info" role="alert">
                <span class="la la-info" aria-hidden="true"></span>
                You need to <a href="#">Login</a> or <a href="#">Register</a> to submit a review
            </div><!-- ends: .atbd_notice -->

            <form action="http://aazztech.com/" id="atbdp_review_form" method="post">
                <div class="atbd_review_rating_area"> <!--It should be displayed on the left side -->
                    <div class="atbd_review_update_rating">
                        <span>Rating: </span>
                        <div class="atbd_rating_stars">
                            <div class="br-wrapper br-theme-fontawesome-stars m-left-15">
                                <select class="give_rating"> <!-- now hidden -->
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div><!-- ends: .atbd_review_update_rating -->
                </div><!-- ends: .atbd_review_rating_area -->

                <div class="form-group">
                    <textarea name="content" id="review_content" class="form-control" placeholder="Message" required></textarea>
                </div>

                <div class="form-group">
                     <div id="atbd_up_preview"></div>
                     <div class="atbd_upload_btn_wrap">
                         <label for="atbd_review_attachment">
                             <input type="file" id="atbd_review_attachment" hidden multiple>
                             <span class="btn btn-md atbd_upload_btn"><span class="la la-cloud-upload"></span>Upload Photo</span>
                         </label>
                         <span id="file_name"></span>
                     </div>
                 </div>

                <!--If current user has a review then show him update and delete button-->
                <button class="btn btn-gradient btn-gradient-one" type="submit" id="atbdp_review_form_submit">Submit Review</button> <!-- submit button -->
            </form>

        </div><!-- ends: .atbd_give_review_area -->
    </div><!-- ends: .atbd_content_module -->
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                              <div class="atbd_content_module atbd_review_module">
        <div class="atbd_content_module__tittle_area">
            <div class="atbd_area_title">
                <h4><span class="la la-star-o"></span>4 Reviews</h4>
                <label for="review_content" class="btn btn-secondary btn-icon-left btn-sm not_empty"><span class="la la-star-o"></span> Add a review</label>
            </div>
        </div>
        <div class="atbdb_content_module_contents">
            <div id="client_review_list">
                <div class="atbd_single_review atbdp_static">
                    <div class="atbd_review_top">
                        <div class="atbd_avatar_wrapper">
                            <div class="atbd_review_avatar"><img alt="" src="img/review-author-thumb.jpg" class="avatar avatar-32 photo"></div>
                            <div class="atbd_name_time">
                                <p>Mark Rose</p>
                                <span class="review_time">6 hours ago</span>
                            </div>
                        </div>
                        <div class="atbd_rated_stars">
                            <ul>
                                <li><span class="rate_active"></span></li>
                                <li><span class="rate_active"></span></li>
                                <li><span class="rate_active"></span></li>
                                <li><span class="rate_active"></span></li>
                                <li><span class="rate_disable"></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="review_content">
                        <p>Lacinia eget consectetur sed, convallis at tellus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus</p>
                        <a href="#" class="reply"><span class="la la-mail-reply-all"></span>Reply</a>
                    </div>
                    <div class="review_reply_form">
                        <div class="atbd_review_avatar"><img alt="" src="img/review-author-thumb2.jpg" class="avatar avatar-32 photo"></div>
                        <form action="http://aazztech.com/">
                            <textarea placeholder="Message" class="form-control"></textarea>
                            <button class="btn btn-sm btn-secondary">Reply</button>
                        </form>
                    </div>

                    <!-- comment depth 2 -->
                    <div class="media-depth2">
                        <div class="atbd_single_review">
                            <div class="atbd_review_top">
                                <div class="atbd_avatar_wrapper">
                                    <div class="atbd_review_avatar"><img alt="" src="img/review-author-thumb2.jpg" class="avatar avatar-32 photo"></div>
                                    <div class="atbd_name_time">
                                        <p>Conrad Jane</p>
                                        <span class="review_time">6 hours ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="review_content">
                                <p>Lacinia eget consectetur sed, convallis at tellus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus vestibulum ac diam sit amet</p>
                                <a href="#" class="reply"><span class="la la-mail-reply-all"></span>Reply</a>
                            </div>
                            <div class="review_reply_form">
                                <div class="atbd_review_avatar"><img alt="" src="img/review-author-thumb.jpg" class="avatar avatar-32 photo"></div>
                                <form action="http://aazztech.com/">
                                    <textarea placeholder="Message" class="form-control"></textarea>
                                    <button class="btn btn-sm btn-secondary">Reply</button>
                                </form>
                            </div>
                        </div><!-- ends: .atbd_single_review -->
                    </div><!-- ends: .media-depth2 -->

                </div><!-- ends:.atbd_single_review -->

                <div class="atbd_single_review atbdp_static">
                    <div class="atbd_review_top">
                        <div class="atbd_avatar_wrapper">
                            <div class="atbd_review_avatar"><img alt="" src="img/review-author-thumb3.jpg" class="avatar avatar-32 photo"></div>
                            <div class="atbd_name_time">
                                <p>Conrad Jane</p>
                                <span class="review_time">6 hours ago</span>
                            </div>
                        </div>
                        <div class="atbd_rated_stars">
                            <ul>
                                <li><span class="rate_active"></span></li>
                                <li><span class="rate_active"></span></li>
                                <li><span class="rate_active"></span></li>
                                <li><span class="rate_active"></span></li>
                                <li><span class="rate_active"></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="review_content">
                        <p>Lacinia eget consectetur sed, convallis at tellus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus</p>
                        <a href="#" class="reply"><span class="la la-mail-reply-all"></span>Reply</a>
                    </div>
                    <div class="review_reply_form">
                        <div class="atbd_review_avatar"><img alt="" src="img/review-author-thumb2.jpg" class="avatar avatar-32 photo"></div>
                        <form action="http://aazztech.com/">
                            <textarea placeholder="Message" class="form-control"></textarea>
                            <button class="btn btn-sm btn-secondary">Reply</button>
                        </form>
                    </div>
                </div><!-- ends: .atbd_single_review -->
            </div><!-- ends: .client_review_list -->
            <div class="review_pagination">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#"><span class="la la-angle-left"></span></a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#"><span class="la la-angle-right"></span></a></li>
                </ul>
            </div>
        </div>
    </div><!-- ends: .atbd_content_module -->
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
                 </div>
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