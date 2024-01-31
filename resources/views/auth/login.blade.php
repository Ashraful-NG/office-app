<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="icon" href="{{ asset('img/caab24.png') }}" type="image/png">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

 

</head>

<body >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/caab24.png') }}" width="50" alt="CAAB" class="me-2">
                    DMS
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if (auth()->check())
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('document.index') }}">Documents</a>
                            </li>
                        </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="btn btn-dark px-5" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                            </li>
                            
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item d-none">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                       
                        <li>
                
                        <!-- Logout Form -->
    

                            <a  class="nav-link " href="#">
                                {{ Auth::user()->name }}
                            </a>
                        
                            {{-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- User Profile Link or Additional Dropdown Items -->
                        
                                {{-- <a class="dropdown-item" href="{{ route('profile') }}">
                                    {{ __('Profile') }}
                                </a> --}}
                        
                                {{-- <div class="dropdown-divider"></div> --}}
                        
                                <!-- Logout Link -->
{{--                                
                            </div> --}}  
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class=" btn btn-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                       
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

<section id="login" class="d-flex align-items-center pb-5">
    <div class="login-panel">
        <div class="login-section">
            <div>
                <h3 class="mb-4 h4 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/caab24.png') }}" width="100" alt="CAAB" class="me-2">
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
                    <div class="mb-3 forget d-flex justify-content-between align-items-center">
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
                    </div>
                    <div class="">
                        <button class="btn submit-btn" type="submit">{{ __('Login') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

        </main>
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    {{-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>

