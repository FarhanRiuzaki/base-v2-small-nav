<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">

    @yield('title')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="app flex-row align-items-center">

    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        @php
            $ua = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
        @endphp
        @if (preg_match('~MSIE|Internet Explorer~i', $ua) || (strpos($ua, 'Trident/7.0') !== false && strpos($ua, 'rv:11.0') !== false))
            <div style="text-align: center;">
                <div style="margin: 0 auto; margin-top: 5%">
                    <img src="{{asset('images/not-suport.png')}}" alt="" srcset="" style="width: 30%">
                    <h3>You are using IE browser, please use another browser</h3>
                </div>
            </div>
        @else
            @yield('content')
        @endif

    </div>

    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('adminart/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('adminart/src/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('adminart/src/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>
</html>
