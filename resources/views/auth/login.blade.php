@extends('frontend.layouts.app_plain')

@section('title', 'EasyPay Login')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6 col-sm-12">
            <div class="card auth-form">
                <div class="card-body">
                    <h3 class="text-center">Login</h3>
                    <p class="text-center">Fill the form to login.</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control mt-1 shadow-none @error('phone') is-invalid @enderror" name="phone" id="phone" autocomplete="false">
                            
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control mt-1 shadow-none @error('password') is-invalid @enderror" name="password"  autocomplete="false" id="password">
                            
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-theme my-3 btn-block w-100">Log In</button>

                        <div class="d-flex justify-content-between align-items-center login-footer">
                            <a href="{{ route('register') }}">
                                Don't have account? Register here.
                            </a>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
