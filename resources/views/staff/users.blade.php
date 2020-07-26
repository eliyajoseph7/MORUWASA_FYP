@extends('constants.headerAndSide')

@section('content')
    
    <div class="row wrapper border-bottom white-bg page-heading m-auto mb-3">
        <div class="col-lg-10">
            <h2>Customers</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('/home')}}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Activities</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Users Management</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    @if(session('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('info')}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
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
    <div class="col-md-4 bt p-3">
        <button class="btn btn-primary">Register User</button>
    </div>
            <div class="row ">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Register User</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#" class="dropdown-item">Config option 1</a>
                                    </li>
                                    <li><a href="#" class="dropdown-item">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content usr" style="display: none;">
                            <h2>
                                User registration Form
                            </h2>
                            <p>
                                Follow the steps to add new system user user.
                            </p>

                            <form id="form" method="POST" action="{{ url('/registerUser') }}" class="wizard-big">
                                @csrf
                                <h1>Account</h1>
                                <fieldset>
                                    <h2>Account Information</h2>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Username *</label>
                                                <input id="userName" name="username" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Password *</label>
                                                <input id="password" name="password" type="password" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password *</label>
                                                <input id="confirm" name="confirm" type="password" class="form-control required">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <div style="margin-top: 20px">
                                                    <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <h1>Profile</h1>
                                <fieldset>
                                    <h2>Profile Information</h2>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>First name *</label>
                                                <input id="name" name="firstname" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Last name *</label>
                                                <input id="surname" name="lastname" type="text" class="form-control required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input id="email" name="email" type="email" class="form-control required email">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone *</label>
                                                <input name="phone" type="tel" class="form-control"
                                                        id="phone" required>
                                                <small class="custom-control-input  @error('phone') is-invalid @enderror col-md-12" value="{{ old('phone') }}"></small>

                                                @error('phone')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <h1>Others</h1>
                                <fieldset>
                                    <h2>Other Information</h2>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>User Permission *</label>
                                                <select name="permission" class="form-control" required>
                                                    <option value=""> Select.. </option>
                                                    <option value="superuser"> Superuser </option>
                                                    <option value="user"> Normal user </option>
                                                </select>
                                                
                                                <small class="custom-control-input  @error('permission') is-invalid @enderror col-md-12"></small>
                                            @error('permission')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror 
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-8">
                                                    <label>Occupation *</label>
                                                    <select name="occupation" class="form-control" required>
                                                        <option value=""> Select.. </option>
                                                        <option value="bill officer"> Bill Officer </option>
                                                        <option value="bill manager"> Bill Manager </option>
                                                        <option value="accountant"> Accountant </option>
                                                    </select>
                                                    
                                                    <small class="custom-control-input  @error('occupation') is-invalid @enderror col-md-12"></small>
                                                @error('occupation')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Gender *</label>
                                                    <select name="gender" class="form-control" required>
                                                            <option value=""> Select.. </option>
                                                            <option value="M"> Male </option>
                                                            <option value="F"> Female </option>
                                                        </select>
                                                        
                                                        <small class="custom-control-input  @error('gender') is-invalid @enderror col-md-12"></small>
                                                    @error('gender')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="text-center">
                                                <div style="margin-top: 20px">
                                                    <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <h1>Finish</h1>
                                <fieldset>
                                    <h2>Ready to register user?</h2>
                                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">Check the box for assurence.</label>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    </div>

                </div>
                @include('staff.userList')
            </div>
            
@endsection