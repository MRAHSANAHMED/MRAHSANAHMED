<!DOCTYPE html>
<html lang="en">

<head>
{{-- {{ asset() }} --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fame - One Page Multipurpose Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('asset/asset-client/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="{{ asset('asset/asset-client/css/font-awesome.min.css') }}" rel="stylesheet">


    <!-- Animate CSS -->
    <link href="{{ asset('asset/asset-client/css/animate.css') }}" rel="stylesheet" >

    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="{{ asset('asset/asset-client/css/owl.carousel.css') }}" >
    <link rel="stylesheet" href="{{ asset('asset/asset-client/css/owl.theme.css') }}" >
    <link rel="stylesheet" href="{{ asset('asset/asset-client/css/owl.transitions.css') }}" >

    <!-- Custom CSS -->
    <link href="{{ asset('asset/asset-client/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/asset-client/css/responsive.css') }}" rel="stylesheet">

    <!-- Colors CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/asset-client/css/color/green.css') }}">



    <!-- Colors CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/asset-client/css/color/green.css') }}" title="green">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/asset-client/css/color/light-red.css') }}" title="light-red">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/asset-client/css/color/blue.css') }}" title="blue">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/asset-client/css/color/light-blue.css') }}" title="light-blue">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/asset-client/css/color/yellow.css') }}" title="yellow">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/asset-client/css/color/light-green.css') }}" title="light-green">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>


    <!-- Modernizer js -->
    <script src="{{ asset('asset/asset-client/js/modernizr.custom.js') }}"></script>


    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="index">


    <!-- Styleswitcher
================================================== -->
        <div class="colors-switcher">
            <a id="show-panel" class="hide-panel"><i class="fa fa-tint"></i></a>
                <ul class="colors-list">
                    <li><a title="Light Red" onClick="setActiveStyleSheet('light-red'); return false;" class="light-red"></a></li>
                    <li><a title="Blue" class="blue" onClick="setActiveStyleSheet('blue'); return false;"></a></li>
                    <li class="no-margin"><a title="Light Blue" onClick="setActiveStyleSheet('light-blue'); return false;" class="light-blue"></a></li>
                    <li><a title="Green" class="green" onClick="setActiveStyleSheet('green'); return false;"></a></li>

                    <li class="no-margin"><a title="light-green" class="light-green" onClick="setActiveStyleSheet('light-green'); return false;"></a></li>
                    <li><a title="Yellow" class="yellow" onClick="setActiveStyleSheet('yellow'); return false;"></a></li>

                </ul>

        </div>
<!-- Styleswitcher End
================================================== -->


@yield('content')

<footer class="style-1">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <span class="copyright">Copyright &copy; <a href="http://guardiantheme.com">GuardinTheme</a> 2015</span>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="footer-social text-center">
                    <ul>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="footer-link">
                    <ul class="pull-right">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
</section>


<div id="loader">
<div class="spinner">
    <div class="dot1"></div>
    <div class="dot2"></div>
</div>
</div>



<!-- jQuery Version 2.1.1 -->
<script src="{{ asset('asset/asset-client/js/jquery-2.1.1.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('asset/asset-client/js/bootstrap.min.js') }}"></script>

<!-- Plugin JavaScript -->
<script src="{{ asset('asset/asset-client/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('asset/asset-client/js/classie.js') }}"></script>
<script src="{{ asset('asset/asset-client/js/count-to.js') }}"></script>
<script src="{{ asset('asset/asset-client/js/jquery.appear.js') }}"></script>
<script src="{{ asset('asset/asset-client/js/cbpAnimatedHeader.js') }}"></script>
<script src="{{ asset('asset/asset-client/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('asset/asset-client/js/jquery.fitvids.js') }}"></script>
<script src="{{ asset('asset/asset-client/js/styleswitcher.js') }}"></script>

<!-- Contact Form JavaScript -->
<script src="{{ asset('asset/asset-client/js/jqBootstrapValidation.js') }}"></script>
<script src="{{ asset('asset/asset-client/js/contact_me.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset('asset/asset-client/js/script.js') }}"></script>

</body>

</html>
