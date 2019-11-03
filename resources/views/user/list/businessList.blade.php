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
                                <h4>General Information</h4>
                            </div>
                        </div>
                         <input name="contact_id" type="hidden" value="{{$contact->id}}">
                         <input name="listing_id" type="hidden" value="{{$listing->id}}">
                        <div class="atbdb_content_module_contents">
                            <div class="form-group">
                                    <label for="ad_categroy" class="form-label">Select Area</label>
                                    <div class="select-basic">
                                        <select id="area"  name="category_id" required="required" class="categ form-control " id="ad_area">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- ends: .form-group -->
                            
                                <div class="form-group">
                                    <label for="title" class="form-label">Business Name</label>
                                    <input type="text" required="required" name="general[business_name]" class="form-control" id="title" placeholder="Enter Business Name" value="{{$listing->business_name}}">
                                </div>
                               

                                <div class="form-group">
                                    <label for="title" class="form-label">Address</label>
                                    <input type="text" name="general[address1]" required="required" class="form-control" id="title" placeholder="Enter Address 1" value="">
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
                                        <select name="general[city_id]" required="required" class="city form-control " id="ad_city">
                                            <option value="">Select City</option>
                                            
                                                <option value="{{$listing->city->id}}">{{$listing->city->city_name}}</option>
                                          
                                        </select>
                                    </div>
                                </div><!-- ends: .form-group -->
                                <div class="form-group col-sm-6">
                                    <label for="ad_categroy" class="form-label">Select Area</label>
                                    <div class="select-basic">
                                        <select onchange="populatePincode();" id="area"  name="general[area_id]" required="required" class="area form-control " id="ad_area">
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
                                             <optgroup id="pincode">
                          
                                             </optgroup>
                                        </select>
                                    </div>
                                </div><!-- ends: .form-group -->

                                <div class="form-group col-sm-6">
                                    <label for="ad_categroy" class="form-label">Select State</label>
                                    <div class="select-basic">
                                        <select name="general[state_id]" required="required" class="state form-control ad_search_category" id="ad_state">
                                            <option>Select State</option>
                                            @foreach($states as $state)
                                            <option>{{$state->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- ends: .form-group -->

                                <div class="form-group col-sm-6">
                                    <label for="title" class="form-label">Select Country</label>
                                    <div class="select-basic">
                                        <select name="general[country_id]" required="required" class="form-control ad_search_category" id="ad_country">
                                            <option>Select Country</option>
                                            <option>India</option>
                                        </select>
                                    </div>
                                </div><!-- ends: .form-group -->
                                
                                </div>
                                <br>
                                <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="title" class="form-label">Offer</label>
                                    <input type="text" name="general[offer]" class="form-control" id="title" placeholder="Enter Offer"
                                           required>
                                </div>
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
                                    <input name="contact[p_name]" required="required" type="text" placeholder="Contact Person" id="address" class="form-control" value="{{$contact->p_name}}">
                                </div>
                                <div class="form-group col-sm-5">
                                    <label for="address" class="form-label">Designation</label>
                                    <input name="contact[designation]" required="required" type="text" placeholder="Designation" id="address" class="form-control" value="{{$contact->designation}}">
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone_number" class="form-label">Email</label>
                                    <input name="contact[email]" required="required" type="text" placeholder="Email" id="phone_number" class="form-control"  value="{{$contact->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input name="contact[phone]" required="required" type="text" placeholder="Phone Number" id="phone_number" class="form-control" value="{{$contact->phone}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number" class="form-label">Landline Number</label>
                                    <input name="contact[landline]" required="required" type="text" placeholder="Landline Number" id="phone_number" class="form-control" value="{{$contact->landline}}">
                                </div>

                                <div class="form-group">
                                    <label for="phone_number" class="form-label">Fax Number</label>
                                    <input name="contact[fax]" type="text" placeholder="Fax Number" id="phone_number" class="form-control" value="{{$contact->fax}}">
                                </div>
                               
                                <div class="form-group">
                                    <label for="website_address" class="form-label">Website</label>
                                    <input name="contact[website]" value="{{$contact->website}}" type="text" id="website_address" class="form-control" placeholder="Listing Website eg. http://example.com">
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
                        <div class="atbdb_content_module_contents ">
                            <div class="business-hour">
                                
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
<script type="text/javascript">
    function populatePincode(){
 var area = $('#area').find(":selected").val();
 var action = "getPincode";
          var url = SITE_URL+"/user/ajax/"+action+"/"+area;
          //alert(url);
          $.ajax({
                method: 'get',
                url: url,
                dataType:'html',
                success: function(response){
                 $('#pincode').html(response);
                    console.log(response);
                },
                error: function(data){
                    console.log(data);
                    //alert("fail" + ' ' + this.data)
                },
            });
           
        }
</script>
<script type="text/javascript">
    $(document).ready(function() {
    $('.city').select2();
    $('.area').select2();
    $('.state').select2();
    $('.categ').select2();
});
</script>
<script type="text/javascript">
function valueChanged()
{
    if($('#enable247hour').is(":checked"))   
        $(".answer").hide();
    else
        $(".answer").show();
}
</script>
@endsection