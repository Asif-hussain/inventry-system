<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="/frontend_temp/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="/frontend_temp/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="/frontend_temp/css/bootstrap-submenu.css">

    <link rel="stylesheet" type="text/css" href="/frontend_temp/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="/frontend_temp/css/magnific-popup.css">
    <link rel="stylesheet" href="/frontend_temp/css/leaflet.css" type="text/css">
    <link rel="stylesheet" href="/frontend_temp/css/map.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="/frontend_temp/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/frontend_temp/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="/frontend_temp/fonts/linearicons/style.css">
    <link rel="stylesheet" type="text/css"  href="/frontend_temp/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css"  href="/frontend_temp/css/dropzone.css">
    <link rel="stylesheet" type="text/css"  href="/frontend_temp/css/slick.css">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="/frontend_temp/css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="/frontend_temp/css/skins/default.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="/frontend_temp/css/ie10-viewport-bug-workaround.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script  src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script  src="/frontend_temp/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script  src="js/html5shiv.min.js"></script>
        <script  src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="app">
        <div class="page_loader"></div>
        <!-- Main header start -->
        <header class="main-header header-transparent sticky-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand logo" href="index.html" style="color: black;">
                    LIQUID EQUITY
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="faqs2.html" id="">
                                FAQ's
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="company1.html" id="">
                                Company
                            </a>
                        </li>


                        <li class="nav-item active customNavLi" > <a class="btn btn-theme btn-sm customNavBtn" href="javascript:void(0)" data-toggle="modal" data-target="#Login">Login</a> </li>
                        <li class="nav-item active customNavLi" > <a class="btn btn-theme btn-sm customNavBtn" href="javascript:void(0)" data-toggle="modal" data-target="#Login2">Get Started</a> </li>

                    </ul>
                </div>
            </nav>
        </div>
        </header>

        <!-- Main header end -->
        @yield('content')
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
        </nav> --}}
    </div>
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Modal -->
    <script src="/frontend_temp/js/jquery-2.2.0.min.js"></script>
    <script src="/frontend_temp/js/popper.min.js"></script>
    <script src="/frontend_temp/js/bootstrap.min.js"></script>

    <script  src="/frontend_temp/js/bootstrap-submenu.js"></script>
    <script  src="/frontend_temp/js/rangeslider.js"></script>
    <script  src="/frontend_temp/js/jquery.mb.YTPlayer.js"></script>
    <script  src="/frontend_temp/js/bootstrap-select.min.js"></script>
    <script  src="/frontend_temp/js/jquery.easing.1.3.js"></script>
    <script  src="/frontend_temp/js/jquery.scrollUp.js"></script>
    <script  src="/frontend_temp/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script  src="/frontend_temp/js/leaflet.js"></script>
    <script  src="/frontend_temp/js/leaflet-providers.js"></script>
    <script  src="/frontend_temp/js/leaflet.markercluster.js"></script>
    <script  src="/frontend_temp/js/dropzone.js"></script>
    <script  src="/frontend_temp/js/slick.min.js"></script>
    <script  src="/frontend_temp/js/jquery.filterizr.js"></script>
    <script  src="/frontend_temp/js/jquery.magnific-popup.min.js"></script>
    <script  src="/frontend_temp/js/jquery.countdown.js"></script>
    <script  src="/frontend_temp/js/maps.js"></script>
    <script  src="/frontend_temp/js/app.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script  src="/frontend_temp/js/ie10-viewport-bug-workaround.js"></script>
    <!-- Custom javascript -->
    <script  src="/frontend_temp/js/ie10-viewport-bug-workaround.js"></script>
    <script>
        $(document).ready(function () {
            // $('.customInstaIcn').css('color','grey');

            // $(".customInstaIcn").hover(function() {
            //     $(this).css("color","mediumvioletred")
            // }).mouseout(function(){
            //     $(this).css({"color":"grey",});
            // });

        })
        function forgot() {
            $('#cncl').click()
            $('#frgt').click()
        }
    </script>
</body>
</html>
