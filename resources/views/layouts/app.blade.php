<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
{{--    <link rel="stylesheet" href="css/signin.css?<?=filectime('css/signin.css')?>">--}}
    <link rel="stylesheet" href="/css/home.css?<?=filectime('css/home.css')?>">
{{--    <link rel="stylesheet" href="/css/animations.css?<?=filectime('css/animations.css')?>">--}}
{{--    <link rel="stylesheet" href="/css/sidemenu.css?<?=filectime("css/sidemenu.css")?>">--}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="home">
            <div class="container-home">
                <div style="grid-area: hi">
                    <a href="{{ url('/') }}"><h1>Привет!</h1></a>

                    <div class="menu-home">
                        <a style="all: unset" href="{{ url('/main') }}">
                        <div class="button-home hvr-fade">
                            <h4>Main Page</h4>
                        </div>
                        </a>
                        <a style="all: unset" href="{{ url('#') }}">
                        <div class="button-home hvr-fade">
                            <h4>Test</h4>
                        </div>
                        </a>
                            <a style="all: unset" href="{{ url('#') }}">
                        <div class="button-home hvr-fade">
                            <h4>Test</h4>
                        </div>
                            </a>
                    </div>
                </div>
                @guest
                    <div class="login container-inner-home">
                        <div>
                            <p>Ты не зарегестрован</p>

                            @if (Route::has('login'))

                                <a style="all: unset;" class="nav-link" href="{{ route('login') }}">
                                    <div class="button-home hvr-fade hvr-login" >
                                        <h4>login</h4>
                                    </div>
                                </a>
                            @endif

                            @if (Route::has('register'))
                                <a style="all: unset;" class="nav-link" href="{{ route('register') }}" >
                                    <div style="margin-top: 20px" class="button-home hvr-fade hvr-reg" >
                                        <h4>register</h4>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="user container-inner-home">
                        <div style=" text-align: center">
                            <p>Ты зарегестрован</p>
                            <p>И тебя будем звать:</p>
                            <p style="color: #4EB788">
                                {{ Auth::user()->name }}
                            </p>
                            <a style="all: unset;" class="nav-link" href="{{ route('logout') }}" >
                                <div style="margin-top: 20px" class="button-home hvr-fade hvr-reg" onclick="event.preventDefault();
                                                                                            document.getElementById('logout-form').submit();">
                                    <h4>Logout</h4>
                                </div>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
            </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
