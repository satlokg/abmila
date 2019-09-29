@extends('layouts.user')
 @section('css')
 @endsection
 @section('bread')
 
 @endsection


@section('content')

<section class="add-listing-wrapper border-bottom section-bg section-padding-strict">
        <div class="container">
            <form action="{{route('businessPost')}}" method="post">
                @csrf
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="atbd_content_module">
                        <div class="atbd_content_module__tittle_area">
                            <div class="atbd_area_title">
                                <h4><span class="la la-user"></span>General Information</h4>
                            </div>
                        </div>
                        <div class="atbdb_content_module_contents">
                            
                                <div class="form-group">
                                    <label for="title" class="form-label">Business Name</label>
                                    <input type="text" required="required" name="general[business_name]" class="form-control" id="title" placeholder="Enter Business Name"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="desc" class="form-label">Long Description</label>
                                    <textarea id="desc" required="required" name="general[description]" rows="8" class="form-control"
                                              placeholder="Description"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="title" class="form-label">Address 1</label>
                                    <input type="text" name="general[address1]" required="required" class="form-control" id="title" placeholder="Enter Address 1"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label for="title" class="form-label">Address 2</label>
                                    <input type="text" name="general[address2]" required="required" class="form-control" id="title" placeholder="Enter Address 2"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label for="title" class="form-label">Landmark</label>
                                    <input type="text" name="general[landmark]" required="required" class="form-control" id="title" placeholder="Enter Landmark"
                                           required>
                                </div>
                               
                               <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="ad_categroy" class="form-label">Select City</label>
                                    <div class="select-basic">
                                        <select name="general[city_id]" required="required" class="form-control " id="ad_city">
                                            <option value="">Select City</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->city_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- ends: .form-group -->
                                <div class="form-group col-sm-6">
                                    <label for="ad_categroy" class="form-label">Select Area</label>
                                    <div class="select-basic">
                                        <select name="general[area_id]" required="required" class="form-control " id="ad_area">
                                            <option value="">Select Area</option>
                                            @foreach($areas as $area)
                                                <option value="{{$area->id}}">{{$area->area_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- ends: .form-group -->

                                <div class="form-group col-sm-6">
                                    <label for="ad_categroy" class="form-label">Select Pincode</label>
                                    <div class="select-basic">
                                        <select name="general[pincode_id]" required="required" class="form-control " id="ad_pincode">
                                            <option value="">Select Pincode</option>
                                            @foreach($pincodes as $pincode)
                                                <option value="{{$pincode->id}}">{{$pincode->pincode}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- ends: .form-group -->

                                <div class="form-group col-sm-6">
                                    <label for="ad_categroy" class="form-label">Select State</label>
                                    <div class="select-basic">
                                        <select name="general[state_id]" required="required" class="form-control ad_search_category" id="ad_state">
                                            <option>Select State</option>
                                            
                                        </select>
                                    </div>
                                </div><!-- ends: .form-group -->

                                <div class="form-group col-sm-6">
                                    <label for="ad_categroy" class="form-label">Select Country</label>
                                    <div class="select-basic">
                                        <select name="general[country_id]" required="required" class="form-control ad_search_category" id="ad_country">
                                            <option>Select Country</option>
                                            
                                        </select>
                                    </div>
                                </div><!-- ends: .form-group -->
                                </div>

                            
                        </div><!-- ends: .atbdb_content_module_contents -->
                    </div><!-- ends: .atbd_content_module -->
                </div><!-- ends: .col-lg-10 -->





                <div class="col-lg-10 offset-lg-1">
                    <div class="atbd_content_module">
                        <div class="atbd_content_module__tittle_area">
                            <div class="atbd_area_title">
                                <h4><span class="la la-user"></span>Contact Information</h4>
                            </div>
                        </div>
                        <div class="atbdb_content_module_contents">
                           
                                <div class="row">
                                    <div class="form-group col-sm-2">
                                    <label for="ad_categroy" class="form-label">Select State</label>
                                    <div class="select-basic">
                                        <select name="contact[title]" required="required" class="form-control ad_search_category" id="ad_title">
                                            <option>Select Title</option>
                                            <option>Mr.</option>
                                            <option>Mrs.</option>
                                            <option>Ms</option>
                                            
                                        </select>
                                    </div>
                                </div><!-- ends: .form-group -->
                                <div class="form-group col-sm-5">
                                    <label for="address" class="form-label">Contact Person</label>
                                    <input name="contact[p_name]" required="required" type="text" placeholder="Contact Person"
                                           id="address" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-5">
                                    <label for="address" class="form-label">Designation</label>
                                    <input name="contact[designation]" required="required" type="text" placeholder="Designation"
                                           id="address" class="form-control" required>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone_number" class="form-label">Email</label>
                                    <input name="contact[email]" required="required" type="text" placeholder="Email" id="phone_number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input name="contact[phone]" required="required" type="text" placeholder="Phone Number" id="phone_number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone_number" class="form-label">Landline Number</label>
                                    <input name="contact[landline]" required="required" type="text" placeholder="Landline Number" id="phone_number" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone_number" class="form-label">Fax Number</label>
                                    <input name="contact[fax]" required="required" type="text" placeholder="Fax Number" id="phone_number" class="form-control" required>
                                </div>
                               
                                <div class="form-group">
                                    <label for="website_address" class="form-label">Website</label>
                                    <input name="contact[website]" required="required" type="text" id="website_address" class="form-control"
                                           placeholder="Listing Website eg. http://example.com">
                                </div>
                                
                           
                        </div><!-- ends: .atbdb_content_module_contents -->
                    </div><!-- ends: .atbd_content_module -->
                </div><!-- ends: .col-lg-10 -->
                <div class="col-lg-10 offset-lg-1">
                    <div class="atbd_content_module">
                        <div class="atbd_content_module__tittle_area">
                            <div class="atbd_area_title">
                                <h4><span class="la la-calendar-check-o"></span> Opening/Business Hour Information</h4>
                            </div>
                        </div>
                        <div class="atbdb_content_module_contents">
                            <div class="business-hour">
                                <div class="row">
                                    <div class="col-md-12 m-bottom-20">
                                        <div class="enable247hour custom-control custom-checkbox checkbox-outline checkbox-outline-primary">
                                            <input type="checkbox" class="custom-control-input" name="enable247hour" value="1" id="enable247hour">
                                            <label for="enable247hour" class="not_empty custom-control-label"> Is this listing open 24 hours
                                                7 days a week? </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="bdbh_saturday" class="atbd_day_label form-label">Saturday</label>
                                            <div class="row atbd_row_bg">
                                                <div class="col-sm-6">
                                                    <input name="opening[0][day]" required="required" value="Saturday" type="hidden">
                                                    <label for="bdbh_saturday" class="not_empty">Start time</label>
                                                    <input name="opening[0][start]" required="required" type="time" id="bdbh_saturday" value="" class="form-control directory_field">
                                                </div>
                                                <div class="col-sm-6 mt-3 mt-sm-0">
                                                    <label for="bdbh_saturday_cls" class="not_empty">Close time</label>
                                                    <input name="opening[0][close]" required="required" type="time" id="bdbh_saturday_cls" value=""
                                                           class="form-control directory_field">
                                                </div>
                                            </div>

                                            <div class="atbd_mark_as_closed custom-control custom-checkbox checkbox-outline checkbox-outline-primary">
                                                <input name="opening[0][status]" type="checkbox" class="custom-control-input" name="enable247hour" value="0" id="sat_cls">
                                                <label for="sat_cls" class="not_empty custom-control-label"> Mark as Closed </label>
                                            </div>
                                        </div><!-- ends: .form-group -->

                                        <div class="form-group">
                                            <label for="bdbh_sunday" class="atbd_day_label form-label">Sunday</label>
                                            <div class="row atbd_row_bg">
                                                <div class="col-sm-6">
                                                    <input name="opening[1][day]" required="required" value="Sunday" type="hidden">
                                                    <label for="bdbh_sunday" class="not_empty">Start time</label>
                                                    <input name="opening[1][start]" required="required" type="time" id="bdbh_sunday" value=""
                                                           class="form-control directory_field">
                                                </div>

                                                <div class="col-sm-6 mt-3 mt-sm-0">
                                                    <label for="bdbh_sunday_cls" class="not_empty">Close time</label>
                                                    <input name="opening[1][close]" required="required" type="time" id="bdbh_sunday_cls" value=""
                                                           class="form-control directory_field">
                                                </div>
                                            </div>

                                            <div class="atbd_mark_as_closed custom-control custom-checkbox checkbox-outline checkbox-outline-primary">
                                                <input name="opening[1][status]" type="checkbox" class="custom-control-input" name="enable247hour" value="0" id="sun_cls">
                                                <label for="sun_cls" class="not_empty custom-control-label"> Mark as Closed </label>
                                            </div>
                                        </div><!-- ends: .form-group -->

                                        <div class="form-group">
                                            <label for="bdbh_monday" class="atbd_day_label form-label">Monday</label>
                                            <div class="row atbd_row_bg">
                                                <div class="col-sm-6">
                                                    <input name="opening[2][day]" required="required" value="Monday" type="hidden">
                                                    <label for="bdbh_monday" class="not_empty">Start time</label>
                                                    <input name="opening[2][start]" required="required" type="time" id="bdbh_monday" value=""
                                                           class="form-control directory_field">
                                                </div>

                                                <div class="col-sm-6 mt-3 mt-sm-0">
                                                    <label for="bdbh_monday_cls" class="not_empty">Close time</label>
                                                    <input name="opening[2][close]" required="required" type="time" id="bdbh_monday_cls" value=""
                                                           class="form-control directory_field">
                                                </div>
                                            </div>

                                            <div class="atbd_mark_as_closed custom-control custom-checkbox checkbox-outline checkbox-outline-primary">
                                                <input name="opening[2][status]" type="checkbox" class="custom-control-input" name="enable247hour" value="0" id="mon_cls">
                                                <label for="mon_cls" class="not_empty custom-control-label"> Mark as Closed </label>
                                            </div>
                                        </div><!-- ends: .form-group -->

                                        <div class="form-group">
                                            <label for="bdbh_tuesday" class="atbd_day_label form-label">Tuesday</label>
                                            <div class="row atbd_row_bg">
                                                <div class="col-sm-6">
                                                    <input name="opening[3][day]" required="required" value="Tuesday" type="hidden">
                                                    <label  for="bdbh_tuesday" class="not_empty">Start time</label>
                                                    <input name="opening[3][start]" required="required" type="time" id="bdbh_tuesday" value=""
                                                           class="form-control directory_field">
                                                </div>

                                                <div class="col-sm-6 mt-3 mt-sm-0">
                                                    <label for="bdbh_tuesday_cls" class="not_empty">Close time</label>
                                                    <input name="opening[3][close]" required="required" type="time" id="bdbh_tuesday_cls" value=""
                                                           class="form-control directory_field">
                                                </div>
                                            </div>

                                            <div class="atbd_mark_as_closed custom-control custom-checkbox checkbox-outline checkbox-outline-primary">
                                                <input name="opening[3][status]" type="checkbox" class="custom-control-input" name="enable247hour" value="0" id="tue_cls">
                                                <label for="tue_cls" class="not_empty custom-control-label"> Mark as Closed </label>
                                            </div>
                                        </div><!-- ends: .form-group -->

                                        <div class="form-group">
                                            <label for="bdbh_wednesday"
                                                   class="atbd_day_label form-label">Wednesday</label>
                                            <div class="row atbd_row_bg">
                                                <div class="col-sm-6">
                                                    <input name="opening[4][day]" required="required" value="Wednesday" type="hidden">
                                                    <label for="bdbh_wednesday" class="not_empty">Start time</label>
                                                    <input name="opening[4][start]" required="required" type="time" id="bdbh_wednesday" value=""
                                                           class="form-control directory_field">
                                                </div>

                                                <div class="col-sm-6 mt-3 mt-sm-0">
                                                    <label for="bdbh_wednesday_cls" class="not_empty">Close time</label>
                                                    <input name="opening[4][close]" required="required" type="time" id="bdbh_wednesday_cls" value=""
                                                           class="form-control directory_field">
                                                </div>
                                            </div>

                                            <div class="atbd_mark_as_closed custom-control custom-checkbox checkbox-outline checkbox-outline-primary">
                                                <input name="opening[4][status]" type="checkbox" class="custom-control-input" name="enable247hour" value="0" id="wed_cls">
                                                <label for="wed_cls" class="not_empty custom-control-label"> Mark as Closed </label>
                                            </div>
                                        </div><!-- ends: .form-group -->

                                        <div class="form-group">
                                            <label for="bdbh_thursday" class="atbd_day_label form-label">Thursday</label>
                                            <div class="row atbd_row_bg">
                                                <div class="col-sm-6">
                                                    <input name="opening[5][day]" required="required" value="Thursday" type="hidden">
                                                    <label for="bdbh_thursday" class="not_empty">Start time</label>
                                                    <input name="opening[5][start]" required="required" type="time" id="bdbh_thursday" value=""
                                                           class="form-control directory_field">
                                                </div>

                                                <div class="col-sm-6 mt-3 mt-sm-0">
                                                    <label for="bdbh_thursday_cls" class="not_empty">Close time</label>
                                                    <input name="opening[5][close]" required="required" type="time" id="bdbh_thursday_cls" value=""
                                                           class="form-control directory_field">
                                                </div>
                                            </div>

                                            <div class="atbd_mark_as_closed custom-control custom-checkbox checkbox-outline checkbox-outline-primary">
                                                <input name="opening[5][status]" type="checkbox" class="custom-control-input" name="enable247hour" value="0" id="thu_cls">
                                                <label for="thu_cls" class="not_empty custom-control-label"> Mark as Closed </label>
                                            </div>
                                        </div><!-- ends: .form-group -->

                                        <div class="form-group">
                                            <label for="bdbh_friday" class="atbd_day_label form-label">Friday</label>
                                            <div class="row atbd_row_bg">
                                                <div class="col-sm-6">
                                                    <input name="opening[6][day]" required="required" value="Friday" type="hidden">
                                                    <label for="bdbh_friday" class="not_empty">Start time</label>
                                                    <input name="opening[6][start]" required="required" type="time" id="bdbh_friday" value=""
                                                           class="form-control directory_field">
                                                </div>

                                                <div class="col-sm-6 mt-3 mt-sm-0">
                                                    <label for="bdbh_friday_cls" class="not_empty">Close time</label>
                                                    <input name="opening[6][close]" required="required" type="time" id="bdbh_friday_cls" value=""
                                                           class="form-control directory_field">
                                                </div>
                                            </div>

                                            <div class="atbd_mark_as_closed custom-control custom-checkbox checkbox-outline checkbox-outline-primary">
                                                <input name="opening[6][status]" type="checkbox" class="custom-control-input" name="enable247hour" value="0" id="fri_cls">
                                                <label for="fri_cls" class="not_empty custom-control-label"> Mark as Closed </label>
                                            </div>
                                        </div><!-- ends: .form-group -->

                                    </div> <!--ends col-md-6 col-sm-12-->
                                </div> <!--ends .row-->
                            </div>
                        </div><!-- ends: .atbdb_content_module_contents -->
                    </div><!-- ends: .atbd_content_module -->
                </div><!-- ends: .col-lg-10 -->

              

               

              

                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="atbd_term_and_condition_area custom-control custom-checkbox checkbox-outline checkbox-outline-primary">
                        <input type="checkbox" class="custom-control-input" name="listing_t" value="1" id="listing_t">
                        <label for="listing_t" class="not_empty custom-control-label">I Agree with all <a href="#" id="listing_t_c">Terms & Conditions</a></label>
                    </div>

                    <div class="btn_wrap list_submit m-top-25">
                        <button type="submit" class="btn btn-primary btn-lg listing_submit_btn">Submit listing</button>
                    </div>
                </div><!-- ends: .col-lg-10 -->

            </div>
        </form>
        </div>
    </section><!-- ends: .add-listing-wrapper -->
@endsection
@section('js')

@endsection