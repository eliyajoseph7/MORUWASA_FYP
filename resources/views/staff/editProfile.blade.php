@extends('constants/headerAndSide')
@section('content')
<!-- script for hiding and showing the passaord fields -->
<script>
 $(document).ready(function(){
     $('.pass').hide();
     $("#changePassword").click(function(){
         $(".pass").toggle();
     });
 });
</script>
<div class="container-fluid">
    <div class="row wrapper border-bottom white-bg page-heading m-auto mb-3">
        <div class="col-lg-10">
            <h2>User Profile</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Your Profile</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
<!-- success alert -->
@if(session('info'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{session('info')}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<!-- Error alert -->
@elseif(session('err'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{session('err')}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if ($errors->any()) 
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="row flex-lg-nowrap mt-3">
  
  <div class="col">
    <div class="row">
      <div class="col col-md-7 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="e-profile">
                <div class="row">
                    <div class="col-12 col-sm-auto mb-3">
                    <div class="mx-auto" style="width: 140px;">
                        <div class="d-flex justify-content-center align-items-center rounded" style="height: 110px; background-color: rgb(233, 236, 239);">
                        <span id="img" style="color: rgb(166, 168, 170); font: bold 8pt Arial;"><img src="{{ url('uploads/staff/'.Auth::user()->image) }}" style="width: 138px; height: 110px;"></span>
                        </div>
                    </div>
                    </div>
                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $staff->firstname.' '. $staff->lastname; ?></h4>
                        <p class="mb-0"><?php echo $staff->email; ?></p>
                        <div class="text-muted"><small>Last updated <?php echo $staff->updated_at->format('d M Y'); ?></small></div>
                        <div class="mt-2">

                        <button class="btn btn-primary" type="button" id="OpenImgUpload">
                            <i class="fa fa-fw fa-camera"></i>
                            <span>Change Photo</span>
                        </button>
                        </div>
                    </div>
                    <div class="text-center text-sm-right">
                        <span class="badge badge-secondary"><?php echo $staff->occupation; ?></span>
                        <div class="text-muted"><small>Registered <?php echo $staff->created_at->format('d M Y'); ?></small></div>
                    </div>
                    </div>
                </div>
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                </ul>
                    <div class="tab-content pt-3">
                        <div class="tab-pane active">
                            <form class="form"  method="POST" action="{{ url('/updateProfile',array($staff->id)) }}"  enctype="multipart/form-data">
                            {{csrf_field()}}

                            <input for="img" type="file" name="image" id="imgupload" style="display:none"/>

                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input id="firstname" type="text" class="form-control" name="firstname" value=<?php echo  $staff->firstname; ?> autofocus>
                                                    <div class="custom-control-input  @error('firstname') is-invalid @enderror col-md-6" value="{{ old('firstname') }}"></div>

                                                @error('firstname')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input id="lastname" type="text" class="form-control" name="lastname" value=<?php echo  $staff->lastname; ?>>
                                                    <div class="custom-control-input  @error('lastname') is-invalid @enderror col-md-6" value="{{ old('lastname') }}"></div>

                                                @error('lastname')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input id="email" type="email" class="form-control" name="email" value=<?php echo  $staff->email; ?>>
                                                    <div class="custom-control-input  @error('email') is-invalid @enderror col-md-6" value="{{ old('email') }}"></div>

                                                @error('email')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" value=<?php echo  $staff->username; ?>>
                                                    
                                                @error('username')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input name="phone" type="tel" class="form-control"
                                                            id="phone" value=<?php echo  $staff->phone; ?>>
                                                    <div class="custom-control-input  @error('phone') is-invalid @enderror col-md-6" value="{{ old('phone') }}"></div>

                                                    @error('phone')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                        <div class="col mb-3">
                                            <div class="form-group">
                                            <label>About</label>
                                            <textarea class="form-control" name="bio" rows="5" placeholder="My Bio"></textarea>
                                            </div>
                                        </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 mb-3">
                                        <div id="changePassword" class="mb-2" style="cursor: pointer;"><b class="label label-success">Change Password<i class="fas fa-pen"></i></b></div>
                                        <div class="row pass">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Current Password</label>
                                                    <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password">

                                                    @error('current_password')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>  
                                            </div>
                                        </div>
                                    
                                        <div class="row pass">
                                            <div class="col">
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                                    @error('password')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row pass">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                                                    <input id="password-confirm" class="form-control" name="password_confirmation" type="password" ></div>
                                                </div>
                                            </div>
                                        </div>
                                
                                    </div>
                                    <div class="row">
                                        <div class="col d-flex justify-content-end">
                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                        </div>
                                    </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

      <div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
          <div class="card-body">
            <div class="px-xl-3">
                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <button class="btn btn-block btn-secondary">
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                    </button>
                </a>
            </div>
          </div>
        </div>
        <!-- <div class="card">
          <div class="card-body">
            <h6 class="card-title font-weight-bold">Support</h6>
            <p class="card-text">Get fast, free help from our friendly assistants.</p>
            <button type="button" class="btn btn-primary">Contact Us</button>
          </div>
        </div> -->
      </div>
    </div>

  </div>
</div>
</div>

<script>
$('#OpenImgUpload').click(function(){ 
    $('#imgupload').trigger('click');
    
 });

 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // this is for avoiding page expired error
    }
});

</script>

@endsection