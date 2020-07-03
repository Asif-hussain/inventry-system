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




        <header class="main-header header-2 fixed-header">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light"> <a class="navbar-brand logo pad-0" href="index.html"> LIQUID EQUITY </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto d-lg-none d-xl-none">
          <li class="nav-item dropdown active"> <a href="dashboard.html" class="nav-link">Dashboard</a> </li>
          <li class="nav-item dropdown"> <a href="messages.html" class="nav-link">Messages</a> </li>
          <li class="nav-item dropdown"> <a href="bookings.html" class="nav-link">Bookings</a> </li>
          <li class="nav-item dropdown"> <a href="my-properties.html" class="nav-link">My Properties</a> </li>
          <li class="nav-item dropdown"> <a href="my-invoices.html" class="nav-link">My Invoices</a> </li>
          <li class="nav-item dropdown"> <a href="favorited-properties.html" class="nav-link">Favorited Properties</a> </li>
          <li class="nav-item dropdown"> <a href="submit-property.html" class="nav-link">Submit Property</a> </li>
          <li class="nav-item dropdown"> <a href="my-profile.html" class="nav-link">My Profile</a> </li>
          <li class="nav-item dropdown"> <a href="index.html" class="nav-link">Logout</a> </li>
        </ul>
        <div class="navbar-buttons ml-auto d-none d-xl-block d-lg-block">
          <ul>
            
            <li> <a class="btn btn-theme btn-md" href="account.html">My Account</a> </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>



        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Liquid Equity') }}
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

        <!-- Main header end -->
        @yield('content')
        
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




<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> 
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug --> 
<script src="https://task-admin.prowebsitedemos.com/assets/plugins/amchart/js/amcharts.js"></script> 
<script src="https://task-admin.prowebsitedemos.com/assets/plugins/amchart/js/gauge.js"></script> 
<script src="https://task-admin.prowebsitedemos.com/assets/plugins/amchart/js/serial.js"></script> 
<script src="https://task-admin.prowebsitedemos.com/assets/plugins/amchart/js/light.js"></script> 
<script src="https://task-admin.prowebsitedemos.com/assets/plugins/amchart/js/pie.min.js"></script> 
<script src="https://task-admin.prowebsitedemos.com/assets/plugins/amchart/js/ammap.min.js"></script> 
<script src="https://task-admin.prowebsitedemos.com/assets/plugins/amchart/js/usaLow.js"></script> 
<script src="https://task-admin.prowebsitedemos.com/assets/plugins/amchart/js/radar.js"></script> 
<script src="https://task-admin.prowebsitedemos.com/assets/plugins/amchart/js/worldLow.js"></script> 
<script>
	$(document).ready(function(){
		var chart=AmCharts.makeChart("chart-percent",{"type":"pie","theme":"light","dataProvider":[{"title":"page done","value":23,"color":"#1de9b6"},{"title":"page progress","value":14,"color":"#f4c22b"},{"title":"page outstanding","value":35,"color":"#a389d4"},{"title":"page started","value":28,"color":"#04a9f5"}],"titleField":"title","valueField":"value","colorField":"color","labelRadius":5,"radius":"42%","innerRadius":"91%","labelText":"","balloon":{"fixedPosition":true},});
		
		var chart=AmCharts.makeChart("line-area2",{"type":"serial","theme":"light","marginTop":10,"marginRight":0,"dataProvider":[{"year":"Jan","value":5,"value2":80,},{"year":"Feb","value":30,"value2":95,},{"year":"Mar","value":25,"value2":87,},{"year":"Apr","value":55,"value2":155,},{"year":"May","value":45,"value2":140,},{"year":"Jun","value":65,"value2":147,},{"year":"Jul","value":60,"value2":130,},{"year":"Aug","value":105,"value2":180,},{"year":"Sep","value":80,"value2":160,},{"year":"Oct","value":110,"value2":175,},{"year":"Nov","value":120,"value2":165,},{"year":"Dec","value":150,"value2":200,}],"valueAxes":[{"axisAlpha":0,"position":"left"}],"graphs":[{"id":"g1","balloonText":"[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>","bullet":"round","lineColor":"#1de9b6","lineThickness":3,"negativeLineColor":"#1de9b6","valueField":"value"},{"id":"g2","balloonText":"[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>","bullet":"round","lineColor":"#10adf5","lineThickness":3,"negativeLineColor":"#10adf5","valueField":"value2"}],"chartCursor":{"cursorAlpha":0,"valueLineEnabled":true,"valueLineBalloonEnabled":true,"valueLineAlpha":0.3,"fullWidth":true},"categoryField":"year","categoryAxis":{"minorGridAlpha":0,"minorGridEnabled":true,"gridAlpha":0,"axisAlpha":0,"lineAlpha":0},"legend":{"useGraphSettings":true,"position":"top"},});
		
		var chart=AmCharts.makeChart("line-area3",{"type":"serial","theme":"light","marginTop":10,"marginRight":0,"dataProvider":[{"year":"Jan","value":5,"value2":80,},{"year":"Feb","value":30,"value2":95,},{"year":"Mar","value":25,"value2":87,},{"year":"Apr","value":55,"value2":155,},{"year":"May","value":45,"value2":140,},{"year":"Jun","value":65,"value2":147,},{"year":"Jul","value":60,"value2":130,},{"year":"Aug","value":105,"value2":180,},{"year":"Sep","value":80,"value2":160,},{"year":"Oct","value":110,"value2":175,},{"year":"Nov","value":120,"value2":165,},{"year":"Dec","value":150,"value2":200,}],"valueAxes":[{"axisAlpha":0,"position":"left"}],"graphs":[{"id":"g1","balloonText":"[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>","bullet":"round","lineColor":"#1de9b6","lineThickness":3,"negativeLineColor":"#1de9b6","valueField":"value"},{"id":"g2","balloonText":"[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>","bullet":"round","lineColor":"#10adf5","lineThickness":3,"negativeLineColor":"#10adf5","valueField":"value2"}],"chartCursor":{"cursorAlpha":0,"valueLineEnabled":true,"valueLineBalloonEnabled":true,"valueLineAlpha":0.3,"fullWidth":true},"categoryField":"year","categoryAxis":{"minorGridAlpha":0,"minorGridEnabled":true,"gridAlpha":0,"axisAlpha":0,"lineAlpha":0},"legend":{"useGraphSettings":true,"position":"top"},});
		
	});
	
	
	
	</script>


</body>
</html>
