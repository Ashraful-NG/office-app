@extends('layouts.app')

@section('content')
    <section id="login" class="d-flex align-items-center pb-5">
        <div class="login-panel">
            <div class="login-section">
                <div>
                    <h3 class="mb-4 h4 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('img/caab_logo.png') }}" width="30" alt="CAAB" class="me-2">
                        <span>LOGIN</span>
                    </h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <img src="{{ asset('img/icons8-user-16.png') }}" alt="">
                                </span>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <img src="{{ asset('img/icons8-password-16.png') }}" alt="">
                                </span>
                            </div>
                            <input id="password" type="password" class="form-control br-0 password" placeholder="Password"
                                @error('password') is-invalid @enderror name="password" required
                                autocomplete="current-password">
                            <div class="input-group-append">
                                <button type="button" class="btn input-group-text password-view password-icon">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="mb-3 forget d-flex justify-content-between align-items-center">
                            <div class="form-group form-check text-left">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div> --}}
                        <div class="">
                            <button class="btn submit-btn" type="submit">{{ __('Login') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
