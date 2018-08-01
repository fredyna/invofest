<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Invofest 2018') }}</title>
    <link rel="icon" type="image/png" href="{{ url('img/logo/invofest_logo.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ url('font-awesome/css/font-awesome.min.css') }}" />

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('css/normalize.css') }}" />	
    <link href="{{ url('css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('css/animate.css') }}" />
    <link href="{{ url('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ url('css/member.css') }}" rel="stylesheet" />
    @yield('mycss')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: #022851;color:#FFF;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color: #FFF;">
                    <img src="{{ url('img/logo/invofest_logo_light.png') }}" alt="Logo Invofest 2018" style="width:30px;">
                    {{ config('app.name', 'Invofest 2018') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color: #FFF;">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" style="color: #FFF;">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('member') }}" style="color: #FFF;"><i class="fa fa-home"></i> </a>
                            </li>
                            
                            @if(isset($user))
                                @include('layouts.partials._menuAfterLogin')
                            @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: #FFF;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                            
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background-color: #022851;">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();" style="color:#FFF;">
                                        {{ __('Logout') }}
                                    </a>
                            
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @include('layouts.partials._alertSuccess')
            @include('layouts.partials._alertError')
            @yield('content')
        </main>
    </div>
</body>
<script src="{{ url('js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ url('js/core/popper.min.js') }}" type="text/javascript"></script>
<script>
    @yield('potongan_script')
</script>
</html>
