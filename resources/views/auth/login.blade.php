@extends('layouts.app')

@section('content')


@include('constants.header')
<div class="page login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow m-auto" style="width: 80%;">
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
    </style>