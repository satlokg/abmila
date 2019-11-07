 @extends('layouts.admin')
 @section('css')
 <link rel="stylesheet" href="{{asset('public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
 @endsection
 @section('bread')
 <section class="content-header">
      <h1>
        Keyword
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Keyword</li>
      </ol>
@endsection


@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Listing Detail</h3>
              @include('admin.list.timeline')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- /.col -->
                <div class="col">
                <div class="row">
                  <div class="col-md-12">
                  <!-- general form elements -->
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Listing Details </h3>
                      </div>
                      <div class="box-body">


                        <div class="form-group">
                            <label for="title" class="form-label">Business Name</label>
                            <div class="form-control">{{@$business->business_name}}</div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="form-label">Address</label>
                            <div class="form-control">{{@$business->address1}}</div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="form-label">Landmark</label>
                            <div class="form-control">{{@$business->landmark}}</div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="form-label">Phone</label>
                            <div class="form-control">{{@$business->contact->phone}}</div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6">
                            <label for="title" class="form-label">City</label>
                            <div class="form-control">{{@$business->area->pincode->zone->city->city_name}}</div>
                          </div>
                          <div class="form-group col-md-6">
                              <label for="title" class="form-label">State</label>
                              <div class="form-control">{{@$business->area->pincode->zone->city->state->name}}</div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-6">
                            <label for="title" class="form-label">Area</label>
                            <div class="form-control">{{@$business->area->area_name}}</div>
                          </div>
                          <div class="form-group col-md-6">
                              <label for="title" class="form-label">Pincode</label>
                              <div class="form-control">{{@$business->area->pincode->pincode}}</div>
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="form-label">Country</label>
                            <div class="form-control">{{@$business->country_id}}</div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="form-label">Offer</label>
                            <div class="form-control">{{@$business->offer}}</div>
                        </div>



                      </div>
                     
                    </div>
                  </div>

                  <div class="col-md-12">
                  <!-- general form elements -->
                    <div class="box box-primary">
                       <div class="box-header with-border">
                        <h3 class="box-title">Contact Details </h3>
                      </div>
                      <div class="box-body">


                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <div class="form-control">{{@$business->contact->title}} {{@$business->contact->p_name}}</div>
                        </div>
                        <div class="row">
                         <div class="form-group col-md-6">
                            <label for="title" class="form-label">Email 1</label>
                            <div class="form-control">{{@$business->business_name}}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title" class="form-label">Email 2</label>
                            <div class="form-control">{{@$business->business_name}}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title" class="form-label">Phone Number 1</label>
                            <div class="form-control">{{@$business->business_name}}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title" class="form-label">Phone Number 2</label>
                            <div class="form-control">{{@$business->business_name}}</div>
                        </div>

                         <div class="form-group col-md-6">
                            <label for="title" class="form-label">Landline Number 1</label>
                            <div class="form-control">{{@$business->business_name}}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title" class="form-label">Landline Number 2</label>
                            <div class="form-control">{{@$business->business_name}}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="title" class="form-label">Fax Number</label>
                            <div class="form-control">{{@$business->business_name}}</div>
                        </div>
                         <div class="form-group col-md-6">
                            <label for="title" class="form-label">Website</label>
                            <div class="form-control">{{@$business->business_name}}</div>
                        </div>
                        </div>

                      </div>
                      
                    </div>
                  </div>



                   <div class="col-md-12">
                  <!-- general form elements -->
                    <div class="box box-primary">
                       <div class="box-header with-border">
                        <h3 class="box-title">Opening/Business Hour Information</h3>
                      </div>
                      <div class="box-body">

                        <p>Is this listing open 24 hours 7 days a week? </p>
                    
                        <table class="table table-responsive">
                          <thead>
                            <tr>
                              <th>Day</th>
                              <th>Open</th>
                              <th>Close</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach(@$business->opennings as $open)
                            <tr>
                              <td>{{@$open->day}}</td>
                              <td>{{@$open->start}}</td>
                              <td>{{@$open->close}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>

                      </div>
                      
                    </div>
                  </div>
                  

                  <div class="col-md-12">
                  <!-- general form elements -->
                    <div class="box box-primary">
                       <div class="box-header with-border">
                        <h3 class="box-title">Keyword Information</h3>
                      </div>
                      <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="form-label">Business Category Name</label>
                            <div class="form-control">{{@$business->getcategory(@$business->listingkeywords[0]->keyword)}}</div>
                        </div>
                    
                        <table class="table table-responsive">
                          <thead>
                            <tr>
                              <th>Keywords</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            @foreach(@$business->listingkeywords as $key)
                            <tr>
                              <td>{{@$key->keyword}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>

                      </div>
                      
                    </div>
                  </div>


                  <div class="col-lg-10 offset-lg-1 text-center">
                   

                    <div class="btn_wrap list_submit m-top-25">
                      @if($business->status==0)
                        <a href="{{route('admin.business',['id'=>$business->id,'action'=>'Approve'])}}" class="btn btn-primary btn-lg listing_submit_btn">Approve</a>
                        @else
                         <a href="{{route('admin.business',['id'=>$business->id,'action'=>'Reject'])}}" class="btn btn-danger btn-lg listing_submit_btn">Reject</a>
                      @endif
                    </div>
                </div><!-- ends: .col-lg-10 -->
                </div>
                <!-- /.col -->
              </div>
                <!-- /.col -->
            </div>
            <!-- ./box-body -->
            
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

   
      <!-- /.row -->
      @endsection
      @section('js')
      <script src="{{asset('public/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
      <script>
          $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
              'paging'      : true,
              'lengthChange': false,
              'searching'   : false,
              'ordering'    : true,
              'info'        : true,
              'autoWidth'   : false
            })
          })
        </script>
      @endsection