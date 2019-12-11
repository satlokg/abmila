 @extends('layouts.admin')
 @section('bread')
 <section class="content-header">
      <h1>
        Dashboard
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
@endsection


@section('content')
 <div class="row">
       <div class="col-sm-12">
         <form method="POST" action="{{ route('update-password') }}">
    @csrf
   
    <div class="form-group row">
        <label for="old_password" class="col-md-2 col-form-label">{{ __('Current password') }}</label>
        <div class="col-md-6">
            <input id="old_password" name="old_password" type="password" class="form-control" required autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label for="new_password" class="col-md-2 col-form-label">{{ __('New password') }}</label>
        <div class="col-md-6">
            <input id="new_password" name="new_password" type="password" class="form-control" required autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label for="password_confirm" class="col-md-2 col-form-label">{{ __('Confirm password') }}</label>

        <div class="col-md-6">
            <input id="password_confirm" name="password_confirm" type="password" class="form-control" required
                   autofocus>
        </div>
    </div>
    <div class="form-group login-row row mb-0">
        <div class="col-md-8 offset-md-2">
            <button type="submit" class="btn btn-primary">
                {{ __('Submit') }}
            </button>
        </div>
    </div>
</form>
       </div>

      </div>
      <!-- /.row -->
      @endsection