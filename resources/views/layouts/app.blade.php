<!DOCTYPE html>
<html lang="en">

<head>
    <title>Winkel - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('template_front/') }}/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('template_front/') }}/css/animate.css">

    <link rel="stylesheet" href="{{ asset('template_front/') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('template_front/') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('template_front/') }}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{ asset('template_front/') }}/css/aos.css">

    <link rel="stylesheet" href="{{ asset('template_front/') }}/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('template_front/') }}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ asset('template_front/') }}/css/jquery.timepicker.css">


    <link rel="stylesheet" href="{{ asset('template_front/') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('template_front/') }}/css/icomoon.css">
    <link rel="stylesheet" href="{{ asset('template_front/') }}/css/style.css">
    {{-- bootsrape --}}
    <link href="{{ asset('bootstrap/') }}/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="{{ asset('bootstrap/') }}/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>




</head>

<body class="goto-here">
    <div class="py-1 bg-black">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-phone2"></span></div>
                            <span class="text">+ 1235 2355 98</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-paper-plane"></span></div>
                            <span class="text">youremail@email.com</span>
                        </div>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                            <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="/">Honesto Shoes</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            {{-- @guest --}}
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
                    @if (Session::get('name') == null)
                        <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="/register" class="nav-link">Sign Up</a></li>
                        <li class="nav-item"><a href="/login_user" class="nav-link">Sign</a></li>

                    @else

                        {{-- <li class="nav-item"><a href="/logout" class="nav-link">Logout</a></li> --}}
                        @php

                            $id_user = Session::get('id');
                            $keranjang = App\Models\Keranjang::where('id_user', $id_user)
                                ->groupBy('tb_keranjang.id_user')
                                ->count();
                        @endphp
                        <li class="nav-item cta cta-colored"><a href="/cart" class="nav-link"><span
                                    class="icon-shopping_cart"></span>[{{ $keranjang }}]</a></li>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">{{ Session::get('name') }}</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="shop.html">Profile</a>
                                <a class="dropdown-item" href="product-single.html">Riwayat Order</a>
                                <a class="dropdown-item" href="cart.html">Cart</a>
                                <a class="dropdown-item" href="/logout">Logout</a>
                            </div>
                        </li>

                        {{-- <li class="nav-item"><a href="/logout" class="nav-link">Logout</a></li> --}}
                    @endif

                    {{-- <li class="nav-item"><a href="/register" class="nav-link">Sign Up</a></li>
                        <li class="nav-item"><a href="/login_user" class="nav-link">Sign</a></li> --}}
                    {{-- <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span
                                    class="icon-shopping_cart"></span>[0]</a></li> --}}

                </ul>
            </div>
            {{-- @else --}}
            {{-- <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Shop</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="shop.html">Shop</a>
                            <a class="dropdown-item" href="product-single.html">Single Product</a>
                            <a class="dropdown-item" href="cart.html">Cart</a>
                            <a class="dropdown-item" href="checkout.html">Checkout</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="/register" class="nav-link">Sign Up</a></li>
                    <li class="nav-item"><a href="/login_user" class="nav-link">Sign</a></li>
                    <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span
                                class="icon-shopping_cart"></span>[0]</a></li>

                </ul>
            </div> --}}

            {{-- @endguest --}}
        </div>
    </nav>
    <!-- END nav -->
    @yield('content')
    <footer class="ftco-footer bg-light ftco-section">
        <div class="container">
            <div class="row">
                <div class="mouse">
                    <a href="#" class="mouse-icon">
                        <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                    </a>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Winkel</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Menu</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Shop</a></li>
                            <li><a href="#" class="py-2 d-block">About</a></li>
                            <li><a href="#" class="py-2 d-block">Journal</a></li>
                            <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Help</h2>
                        <div class="d-flex">
                            <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><a href="#" class="py-2 d-block">FAQs</a></li>
                                <li><a href="#" class="py-2 d-block">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake
                                        St. Mountain View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2
                                            392 3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i
                            class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com"
                            target="_blank">Colorlib</a>Downloaded from <a href="https://themeslab.org/"
                            target="_blank">Themeslab</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('template_front/') }}/js/jquery.min.js"></script>
    <script src="{{ asset('template_front/') }}/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{ asset('template_front/') }}/js/popper.min.js"></script>
    <script src="{{ asset('template_front/') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('template_front/') }}/js/jquery.easing.1.3.js"></script>
    <script src="{{ asset('template_front/') }}/js/jquery.waypoints.min.js"></script>
    <script src="{{ asset('template_front/') }}/js/jquery.stellar.min.js"></script>
    <script src="{{ asset('template_front/') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('template_front/') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('template_front/') }}/js/aos.js"></script>
    <script src="{{ asset('template_front/') }}/js/jquery.animateNumber.min.js"></script>
    <script src="{{ asset('template_front/') }}/js/bootstrap-datepicker.js"></script>
    <script src="{{ asset('template_front/') }}/js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('template_front/') }}/js/google-map.js"></script>
    <script src="{{ asset('template_front/') }}/js/main.js"></script>

</body>

</html>
