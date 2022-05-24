@extends('layouts.app2')
@section('content')

    <!-- Hero/Intro Slider Start -->
    <div class="section">
        <div class="hero-slider swiper-container">
            <div class="swiper-wrapper">

                <div class="hero-slide-item swiper-slide">
                    <div class="hero-slide-bg">
                        <img src="{{ asset('gambar/') }}/slider/slider4.png" alt="Slider Image" />
                    </div>
                    {{-- <div class="container">
                    <div class="hero-slide-content text-start">
                        <h5 class="sub-title">We keep pets for pleasure.</h5>
                        <h2 class="title m-0">Vitamins For all Pets</h2>
                        <p class="ms-0">We know your concerns when you are looking for a chewing treat
                            for your dog.</p>
                        <a href="shop.html" class="btn btn-dark btn-hover-primary">Shop Now</a>
                    </div>
                </div> --}}
                </div>

                <div class="hero-slide-item swiper-slide">
                    <div class="hero-slide-bg">
                        <img src="{{ asset('gambar/') }}/slider/slider2.jpg" alt="Slider Image" />
                    </div>
                    {{-- <div class="container">
                    <div class="hero-slide-content text-center text-md-end">
                        <h5 class="sub-title">We keep pets for pleasure.</h5>
                        <h2 class="title m-0">Vitamins For all Pets</h2>
                        <p>We know your concerns when you are looking for a chewing treat for your dog.</p>
                        <a href="shop.html" class="btn btn-dark btn-hover-primary">Shop Now</a>
                    </div>
                </div> --}}
                </div>
                <div class="hero-slide-item swiper-slide">
                    <div class="hero-slide-bg">
                        <img src="{{ asset('gambar/') }}/slider/gambar1.jpg" alt="Slider Image" />
                    </div>
                    {{-- <div class="container">
                    <div class="hero-slide-content text-center text-md-end">
                        <h5 class="sub-title">We keep pets for pleasure.</h5>
                        <h2 class="title m-0">Vitamins For all Pets</h2>
                        <p>We know your concerns when you are looking for a chewing treat for your dog.</p>
                        <a href="shop.html" class="btn btn-dark btn-hover-primary">Shop Now</a>
                    </div>
                </div> --}}
                </div>
                <div class="hero-slide-item swiper-slide">
                    <div class="hero-slide-bg">
                        <img src="{{ asset('gambar/') }}/slider/gambar2.jpg" alt="Slider Image" />
                    </div>
                    <div class="container">
                        <div class="hero-slide-content text-center text-md-end">
                            <h5 class="sub-title" style="color: white;">Produk Berkualitas.</h5>
                            <h2 class="title m-0" style="color: white;">Harga Terjangkau.</h2>
                            <p style="color: white;">Cekout Sekarang, Sebelum Kehabisan.</p>
                            <a href="#" class="btn btn-dark btn-hover-primary">Shop Now</a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Swiper Pagination Start -->
            <div class="swiper-pagination d-lg-none"></div>
            <!-- Swiper Pagination End -->

            <!-- Swiper Navigation Start -->
            <div class="home-slider-prev swiper-button-prev main-slider-nav d-lg-flex d-none"><i
                    class="icon-arrow-left"></i>
            </div>
            <div class="home-slider-next swiper-button-next main-slider-nav d-lg-flex d-none"><i
                    class="icon-arrow-right"></i></div>
            <!-- Swiper Navigation End -->
        </div>
    </div>
    <!-- Hero/Intro Slider End -->

    <!-- Shop Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9 col-12">


                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper flex-column flex-md-row p-2 m-b-40 border">

                        <!-- Shop Top Bar Left start -->
                        <div class="shop-top-bar-left">

                            <div class="shop_toolbar_btn">
                                <button data-role="grid_4" type="button" class="active btn-grid-4" title="Grid"><i
                                        class="ti-layout-grid4-alt"></i></button>
                                <button data-role="grid_list" type="button" class="btn-list" title="List"><i
                                        class="ti-align-justify"></i></button>
                            </div>
                            <div class="shop-top-show">
                                <span>Showing 1–12 of 39 results</span>
                            </div>

                        </div>
                        <!-- Shop Top Bar Left end -->

                        <!-- Shopt Top Bar Right Start -->
                        <div class="shop-top-bar-right">

                            <h4 class="title m-r-10">Short By: </h4>

                            <div class="shop-short-by">
                                <select class="nice-select" aria-label=".form-select-sm example">
                                    <option selected>Short by Default</option>
                                    <option value="1">Short by Popularity</option>
                                    <option value="2">Short by Rated</option>
                                    <option value="3">Short by Latest</option>
                                    <option value="3">Short by Price</option>
                                    <option value="3">Short by Price</option>
                                </select>
                            </div>
                        </div>
                        <!-- Shopt Top Bar Right End -->

                    </div>
                    <!--shop toolbar end-->

                    <!-- Shop Wrapper Start -->
                    <div class="row shop_wrapper grid_3">

                        <!-- Single Product Start -->
                        @foreach ($produk as $pro)

                            <div class="col-lg-4 col-md-4 col-sm-6 product">
                                <div class="product-inner">
                                    <div class="thumb">
                                        <a href="#" class="action quickview" data-bs-toggle="modal"
                                            data-bs-target="#cart{{ $pro->id_produk }}" title="Quickview"
                                            class="image">
                                            <img class="fit-image"
                                                src="{{ asset('gambar/produk/' . $pro->gambar_produk) }}" height="250px"
                                                alt="Product" />
                                        </a>
                                        {{-- <span class="badges">
                                            <span class="sale">-18%</span>
                                        </span> --}}
                                        <div class="action-wrapper">
                                            <a href="#/" class="action quickview" data-bs-toggle="modal"
                                                data-bs-target="#cart{{ $pro->id_produk }}" title="Quickview"><i
                                                    class="ti-shopping-cart"></i></a>
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                    class="ti-heart"></i></a>
                                            {{-- <a href="cart.html" class="action cart" title="Cart"><i
                                                    class="ti-shopping-cart"></i></a> --}}
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h5 class="title"><a href="#">{{ $pro->nm_produk }}</a>
                                        </h5>
                                        <span class="rating">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </span>
                                        <span class="price">
                                            <span class="new">Rp.
                                                {{ number_format($pro->harga) }}</span>
                                            {{-- <span class="old">$85.80</span> --}}
                                        </span>
                                        <p>It is a long established fact that a reader will be distracted by the
                                            readable
                                            content of a page when looking at its layout. The point of using Lorem
                                            Ipsum is
                                            that
                                            it has a more-or-less normal distribution of letters, as opposed to
                                            using
                                            'Content
                                            here, content here', making it look like readable English.</p>
                                        <!-- Cart Button Start -->
                                        <div class="cart-btn action-btn">
                                            <div class="action-cart-btn-wrapper d-flex">
                                                <div class="add-to_cart">
                                                    <a class="btn btn-primary btn-hover-dark rounded-0" href="cart.html">Add
                                                        to
                                                        cart</a>
                                                </div>
                                                <a href="wishlist.html" title="Wishlist" class="action"><i
                                                        class="ti-heart"></i></a>
                                                <a href="#/" class="action quickview" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view" title="Quickview"><i
                                                        class="ti-plus"></i></a>
                                            </div>
                                        </div>
                                        <!-- Cart Button End -->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Single Product End -->



                    </div>
                    <!-- Shop Wrapper End -->

                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper justify-content-center m-t-50">

                        <!-- Shopt Top Bar Right Start -->
                        <div class="shop-top-bar-right">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link active" href="#/">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#/">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#/">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link rounded-0" href="#/" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Shopt Top Bar Right End -->

                    </div>
                    <!--shop toolbar end-->
                </div>

                <div class="col-lg-3 col-12">
                    <!-- Sidebar Widget Start -->
                    <aside class="sidebar_widget m-t-50 mt-lg-0">
                        <div class="widget_inner">
                            <div class="widget-list m-b-50">
                                <h3 class="widget-title m-b-30">Search</h3>
                                <form action="/search-produk" method="post">
                                    @csrf
                                    <div class="search-box">

                                        <input type="text" name="text" class="form-control" placeholder="Search Our Store"
                                            aria-label="Search Our Store">
                                        <button class="search-icon" type="submit">
                                            <i class="icon-magnifier"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="widget-list m-b-50">
                                <h3 class="widget-title m-b-30">Categories</h3>
                                <div class="sidebar-body">
                                    <ul class="sidebar-list">
                                        <li><a href="/">All Product</a></li>
                                        @foreach ($kategori as $ka)

                                            <li><a href="/kategori/{{ $ka->id_kategori }}">{{ $ka->kategori }}</a></li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            <div class="widget-list m-b-50">
                                <h3 class="widget-title m-b-30">Color</h3>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container categories-list">
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck12">
                                                <label class="custom-control-label" for="customCheck12">black (20)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck13">
                                                <label class="custom-control-label" for="customCheck13">red (6)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck14">
                                                <label class="custom-control-label" for="customCheck14">blue (8)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck11">
                                                <label class="custom-control-label" for="customCheck11">green (5)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck15">
                                                <label class="custom-control-label" for="customCheck15">pink (4)</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            {{-- <div class="widget-list m-b-50">
                                <h3 class="widget-title m-b-30">Tags</h3>
                                <div class="sidebar-body">
                                    <ul class="tags m-b-n10">
                                        <li><a href="#/">Pet Food</a></li>
                                        <li><a href="#/">Animals</a></li>
                                        <li><a href="#/">Domestic</a></li>
                                        <li><a href="#/">Wild</a></li>
                                        <li><a href="#/">Dogs</a></li>
                                        <li><a href="#/">Cats</a></li>
                                        <li><a href="#/">Hubby</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="widget-list">
                                <h3 class="widget-title m-b-30">Recent Products</h3>
                                <div class="sidebar-body product-list-wrapper m-b-n30">

                                    <!-- Single Product List Start -->
                                    <div class="single-product-list m-b-30">

                                        <!-- Product List Thumb Start -->
                                        <div class="product">
                                            <div class="thumb">
                                                <a href="single-product.html" class="image">
                                                    <img class="fit-image first-image"
                                                        src="assets/images/products/small-product/1.png"
                                                        alt="Product Image">
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Product List Thumb End -->

                                        <!-- Product List Content Start -->
                                        <div class="product-list-content">
                                            <h6 class="product-name">
                                                <a href="single-product.html">Pet Leaving House</a>
                                            </h6>
                                            <span class="price">
                                                <span class="new">$12.50</span>
                                                <span class="old">$15.85</span>
                                            </span>
                                        </div>
                                        <!-- Product List Content End -->

                                    </div>
                                    <!-- Single Product List End -->

                                    <!-- Single Product List Start -->
                                    <div class="single-product-list m-b-30">

                                        <!-- Product List Thumb Start -->
                                        <div class="product">
                                            <div class="thumb">
                                                <a href="single-product.html" class="image">
                                                    <img class="fit-image first-image"
                                                        src="assets/images/products/small-product/2.png"
                                                        alt="Product Image">
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Product List Thumb End -->

                                        <!-- Product List Content Start -->
                                        <div class="product-list-content">
                                            <h6 class="product-name">
                                                <a href="single-product.html">This is the testing</a>
                                            </h6>
                                            <span class="price">
                                                <span class="new">$10.50</span>
                                                <span class="old">$12.85</span>
                                            </span>
                                        </div>
                                        <!-- Product List Content End -->

                                    </div>
                                    <!-- Single Product List End -->

                                    <!-- Single Product List Start -->
                                    <div class="single-product-list m-b-30">

                                        <!-- Product List Thumb Start -->
                                        <div class="product">
                                            <div class="thumb">
                                                <a href="single-product.html" class="image">
                                                    <img class="fit-image first-image"
                                                        src="assets/images/products/small-product/3.png"
                                                        alt="Product Image">
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Product List Thumb End -->

                                        <!-- Product List Content Start -->
                                        <div class="product-list-content">
                                            <h6 class="product-name">
                                                <a href="single-product.html">Animals for life</a>
                                            </h6>
                                            <span class="price">
                                                <span class="new">$22.50</span>
                                                <span class="old">$25.85</span>
                                            </span>
                                        </div>
                                        <!-- Product List Content End -->

                                    </div>
                                    <!-- Single Product List End -->

                                </div>
                            </div> --}}
                        </div>
                    </aside>
                    <!-- Sidebar Widget End -->
                </div>
            </div>
        </div>
        <!-- Shop Section End -->
        @foreach ($produk as $p)

            <!-- Modal Start  -->
            <div class="modalquickview modal fade" id="cart{{ $p->id_produk }}" tabindex="-1"
                aria-labelledby="quick-view" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <button class="btn close" data-bs-dismiss="modal">×</button>
                        <div class="row">
                            <div class="col-md-6 col-12">

                                <!-- Product Details Image Start -->
                                <div class="modal-product-carousel">

                                    <!-- Single Product Image Start -->
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <a class="swiper-slide" href="#">
                                                <img class="w-100"
                                                    src="{{ asset('gambar/produk/' . $p->gambar_produk) }}"
                                                    alt="Product">
                                            </a>
                                            {{-- <a class="swiper-slide" href="#">
                                            <img class="w-100"
                                                src="{{ asset('amber/') }}/images/products/large-product/2.png"
                                                alt="Product">
                                        </a>
                                        <a class="swiper-slide" href="#">
                                            <img class="w-100"
                                                src="{{ asset('amber/') }}/images/products/large-product/3.png"
                                                alt="Product">
                                        </a>
                                        <a class="swiper-slide" href="#">
                                            <img class="w-100"
                                                src="{{ asset('amber/') }}/images/products/large-product/4.png"
                                                alt="Product">
                                        </a>
                                        <a class="swiper-slide" href="#">
                                            <img class="w-100"
                                                src="{{ asset('amber/') }}/images/products/large-product/5.png"
                                                alt="Product">
                                        </a> --}}
                                        </div>

                                        <!-- Swiper Pagination Start -->
                                        <!-- <div class="swiper-pagination d-md-none"></div> -->
                                        <!-- Swiper Pagination End -->

                                        <!-- Next Previous Button Start -->
                                        <div class="swiper-product-button-next swiper-button-next"><i
                                                class="ti-arrow-right"></i>
                                        </div>
                                        <div class="swiper-product-button-prev swiper-button-prev"><i
                                                class="ti-arrow-left"></i>
                                        </div>
                                        <!-- Next Previous Button End -->
                                    </div>
                                    <!-- Single Product Image End -->

                                </div>
                                <!-- Product Details Image End -->

                            </div>
                            <div class="col-md-6 col-12 overflow-hidden position-relative">
                                <form action="/add_cart" method="post">
                                    @csrf
                                    <input type="hidden" name="id_produk" value="{{ $p->id_produk }}" id="">

                                    <!-- Product Summery Start -->
                                    <div class="product-summery position-relative">

                                        <!-- Product Head Start -->
                                        <div class="product-head m-b-15">
                                            <h2 class="product-title">{{ $p->nm_produk }}</h2>
                                        </div>
                                        <!-- Product Head End -->

                                        <!-- Rating Start -->
                                        <span class="rating justify-content-start m-b-10">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </span>
                                        <!-- Rating End -->

                                        <!-- Price Box Start -->
                                        <div class="price-box m-b-10">
                                            <span class="regular-price">Rp.
                                                {{ number_format($p->harga, 0, ',', '.') }}</span>
                                            {{-- <span class="old-price"><del>$85.00</del></span> --}}
                                        </div>
                                        <!-- Price Box End -->

                                        <!-- SKU Start -->
                                        {{-- <div class="sku m-b-15">
                                    <span>SKU: 12345</span>
                                </div> --}}
                                        <!-- SKU End -->

                                        <!-- Product Inventory Start -->
                                        <div class="product-inventroy m-b-15">
                                            <span class="inventroy-title"> <strong>STOK:</strong></span>
                                            <span class="inventory-varient">{{ $p->stok }}</span>
                                        </div>
                                        <!-- Product Inventory End -->

                                        <!-- Description Start -->
                                        {{-- <p class="desc-content m-b-25">There are many variations of passages of Lorem Ipsum
                                    available, but the majority have suffered alteration in some form, by injected humour,
                                    or randomised words which don't look even slightly believable.</p> --}}
                                        <!-- Description End -->
                                        <div class="quantity d-flex align-items-center justify-content-start m-b-25">
                                            <span class="m-r-10"><strong>Ukuran: </strong></span>
                                            <div>
                                                @php
                                                    $ukuran = App\Models\UkuranProduk::where('produk_id', $p->id_produk)
                                                        ->orderBy('ukuran', 'asc')
                                                        ->get();
                                                @endphp
                                                @foreach ($ukuran as $uk)

                                                    <input type="radio" value="{{ $uk->ukuran }}" name="ukuran"
                                                        id="">{{ $uk->ukuran }}
                                                @endforeach



                                            </div>

                                        </div>

                                        <!-- Quantity Start -->
                                        <div class="quantity d-flex align-items-center justify-content-start m-b-25">
                                            <span class="m-r-10"><strong>Qty: </strong></span>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" name="jumlah" value="1" type="text">
                                                <div class="dec qtybutton"></div>
                                                <div class="inc qtybutton"></div>
                                            </div>
                                        </div>
                                        <!-- Quantity End -->


                                        <!-- Cart Button Start -->
                                        <div class="cart-btn action-btn m-b-30">
                                            <div class="action-cart-btn-wrapper d-flex justify-content-start">
                                                <div class="add-to_cart">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-hover-dark rounded-0">Add
                                                        to
                                                        cart</button>
                                                </div>
                                                {{-- <a href="wishlist.html" title="Wishlist" class="action"><i
                                                class="ti-heart"></i></a> --}}
                                            </div>
                                        </div>
                                        <!-- Cart Button End -->

                                        <!-- Social Shear Start -->
                                        <div class="social-share">
                                            <div class="widget-social justify-content-center m-b-30">
                                                <a title="Twitter" href="#/"><i class="icon-social-twitter"></i></a>
                                                <a title="Instagram" href="#/"><i class="icon-social-instagram"></i></a>
                                                <a title="Linkedin" href="#/"><i class="icon-social-linkedin"></i></a>
                                                <a title="Skype" href="#/"><i class="icon-social-skype"></i></a>
                                                <a title="Dribble" href="#/"><i class="icon-social-dribbble"></i></a>
                                            </div>
                                        </div>
                                        <!-- Social Shear End -->

                                        <!-- Payment Option Start -->
                                        <div class="payment-option m-t-20 d-flex justify-content-start">
                                            <span><strong>Payment: </strong></span>
                                            <a href="#">
                                                <img class="fit-image m-l-5"
                                                    src="{{ asset('amber/') }}/images/payment/payment_large.png"
                                                    alt="Payment Option Image">
                                            </a>
                                        </div>
                                        <!-- Payment Option End -->

                                    </div>
                                    <!-- Product Summery End -->
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal End  -->
        @endforeach
    @endsection
