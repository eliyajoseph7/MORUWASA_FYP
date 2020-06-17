@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->


@include('constants.header')
<div class="page login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow m-auto">
                <div class="row shadow-lg">
                    <!-- Logo & Information Panel-->
                    <div class="col-lg-6 ">

                        <div class="row log">
                            <div class="mx-auto">
                                <img src="{{ url('img/logo.png') }}">
                            </div>
                            
                        </div>
                        
                        <div class="info d-flex row mx-auto">
                            <div class="content">
                                <div class="logo text-center">
                                    <h1>Dashboard</h1>
                                </div>
                                <p class="text-center">The MORUWASA BackOffice application for billing system</p>
                            </div>
                        </div>
                    </div>
                    <!-- Form Panel    -->
                    <div class="col-lg-6 bg-light">
                        <div class="form d-flex align-items-center">
                            <div class="content bg-light">
                                <!-- <form method="POST" action="{{ route('login') }}">
                                 @csrf
                                
                                    <div class="form-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="E-Mail Address">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                         @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"
                                        placeholder="password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group terms-conditions">
                                        <input class="form-check-input checkbox-template ml-1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">{{ __('Remember Me') }}</label>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                        </button> 
                                        
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </form> -->
                                <form method="POST" action="{{ route('login') }}" class="m-auto">
                                    @csrf
                                    <p class="text-center display-4 text-muted">Login</p>
                                    <hr class="divider" />
                                    <div class="form-group row">
                                        <label for="login-username" class="label-material">User Name</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                                            placeholder="E-Mail Address">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="login-password" class="label-material">Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"
                                        placeholder="password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group terms-conditions">
                                        <input class="form-check-input checkbox-template ml-1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">{{ __('Remember Me') }}</label>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                        </button> 
                                        @if (Route::has('password.request'))
                                            <a class="forgot-pass" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights text-center">
            <p>Design by <a target="_blank" href="https://github.com/eliyajoseph7" class="external">eliyajoseph7</a>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </p>
        </div>
    </div>

    @endsection    

    <style>
        hr.divider {
            max-width: 10rem;
            border-width: 0.2rem;
            border-color: #6C757D;
        }

        
.btn-primary {
    color: color-yiq(#2A6481);
    background-color: #2A6481;
    border-color: #2A6481;
    border-color: #2A6481;
}

.btn-primary:hover {
    color: color-yiq(#173658);
    background-color: #173658;
    border-color: #503ce9;
}

.btn-primary:focus,
.btn-primary.focus {
    -webkit-box-shadow: 0 0 0 0.2rem rgba(121, 106, 238, 0.5);
    box-shadow: 0 0 0 0.2rem rgba(121, 106, 238, 0.5);
}

.btn-primary.disabled,
.btn-primary:disabled {
    color: color-yiq(#2A6481);
    background-color: #2A6481;
    border-color: #2A6481;
}

.btn-primary:not(:disabled):not(.disabled):active,
.btn-primary:not(:disabled):not(.disabled).active,
.show>.btn-primary.dropdown-toggle {
    color: color-yiq(#503ce9);
    background-color: #503ce9;
    border-color: #4631e7;
}

.btn-primary:not(:disabled):not(.disabled):active:focus,
.btn-primary:not(:disabled):not(.disabled).active:focus,
.show>.btn-primary.dropdown-toggle:focus {
    -webkit-box-shadow: 0 0 0 0.2rem rgba(121, 106, 238, 0.5);
    box-shadow: 0 0 0 0.2rem rgba(121, 106, 238, 0.5);
}

.btn-outline-primary {
    color: #2A6481;
    background-color: transparent;
    background-image: none;
    border-color: #2A6481;
}

.btn-outline-primary:hover {
    color: #fff;
    background-color: #2A6481;
    border-color: #2A6481;
}

.btn-outline-primary:focus,
.btn-outline-primary.focus {
    -webkit-box-shadow: 0 0 0 0.2rem rgba(121, 106, 238, 0.5);
    box-shadow: 0 0 0 0.2rem rgba(121, 106, 238, 0.5);
}

.btn-outline-primary.disabled,
.btn-outline-primary:disabled {
    color: #2A6481;
    background-color: transparent;
}

.btn-outline-primary:not(:disabled):not(.disabled):active,
.btn-outline-primary:not(:disabled):not(.disabled).active,
.show>.btn-outline-primary.dropdown-toggle {
    color: color-yiq(#2A6481);
    background-color: #2A6481;
    border-color: #2A6481;
}

.btn-outline-primary:not(:disabled):not(.disabled):active:focus,
.btn-outline-primary:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-primary.dropdown-toggle:focus {
    -webkit-box-shadow: 0 0 0 0.2rem rgba(121, 106, 238, 0.5);
    box-shadow: 0 0 0 0.2rem rgba(121, 106, 238, 0.5);
}

a {
    color: #2A6481;
    text-decoration: none;
}

a:focus,
a:hover {
    color: #173658;
    text-decoration: underline;
}
.login-page .form-holder {
    width: 80%;
    border-radius: 5px;
    overflow: hidden;
    margin-bottom: 50px;
}

.login-page .form-holder .info {
    background: #2A6481;
    color: #fff;
}

@media (max-width: 991px) {
    .login-page .info,
    .login-page .form {
        min-height: auto !important;
    }
    .login-page .info {
        padding-top: 100px !important;
        padding-bottom: 100px !important;
    }
    .login-page .form-holder {
        width: 100%;
    }
}
    </style>