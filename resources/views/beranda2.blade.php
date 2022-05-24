@extends('layouts.app2')
@section('content')
    {{-- <div class="section section-padding">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 m-b-n30">

                <div class="col m-b-30" data-aos="fade-up" data-aos-duration="1000">
                    <!-- Single CTA Wrapper Start -->
                    <div class="single-cta-wrapper">

                        <!-- CTA Icon Start -->
                        <div class="cta-icon">
                            <i class="ti-truck"></i>
                        </div>
                        <!-- CTA Icon End -->

                        <!-- CTA Content Start -->
                        <div class="cta-content">
                            <h4 class="title">Free Shipping</h4>
                            <p>Free shipping on all order</p>
                        </div>
                        <!-- CTA Content End -->

                    </div>
                    <!-- Single CTA Wrapper End -->
                </div>

                <div class="col m-b-30" data-aos="fade-up" data-aos-duration="1100">
                    <!-- Single CTA Wrapper Start -->
                    <div class="single-cta-wrapper">

                        <!-- CTA Icon Start -->
                        <div class="cta-icon">
                            <i class="ti-headphone-alt"></i>
                        </div>
                        <!-- CTA Icon End -->

                        <!-- CTA Content Start -->
                        <div class="cta-content">
                            <h4 class="title">Online Support</h4>
                            <p>Online live support 24/7</p>
                        </div>
                        <!-- CTA Content End -->

                    </div>
                    <!-- Single CTA Wrapper End -->
                </div>

                <div class="col m-b-30" data-aos="fade-up" data-aos-duration="1200">
                    <!-- Single CTA Wrapper Start -->
                    <div class="single-cta-wrapper">

                        <!-- CTA Icon Start -->
                        <div class="cta-icon">
                            <i class="ti-bar-chart"></i>
                        </div>
                        <!-- CTA Icon End -->

                        <!-- CTA Content Start -->
                        <div class="cta-content">
                            <h4 class="title">Money Return</h4>
                            <p>Back guarantee under 5 days</p>
                        </div>
                        <!-- CTA Content End -->

                    </div>
                    <!-- Single CTA Wrapper End -->
                </div>

            </div>
        </div>
    </div> --}}

    <!-- Hero/Intro Slider Start -->
    <div class="section">
        <div class="hero-slider swiper-container">
            <div class="swiper-wrapper">

                <div class="hero-slide-item swiper-slide">
                    <div class="hero-slide-bg">
                        <img src="{{ asset('gambar/') }}/slider/slider.jpg" alt="Slider Image" />
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
            </div>

            <!-- Swiper Pagination Start -->
            <div class="swiper-pagination d-lg-none"></div>
            <!-- Swiper Pagination End -->

            <!-- Swiper Navigation Start -->
            <div class="home-slider-prev swiper-button-prev main-slider-nav d-lg-flex d-none"><i
                    class="icon-arrow-left"></i></div>
            <div class="home-slider-next swiper-button-next main-slider-nav d-lg-flex d-none"><i
                    class="icon-arrow-right"></i></div>
            <!-- Swiper Navigation End -->
        </div>
    </div>
    <!-- Hero/Intro Slider End -->

    <!-- Product Section Start -->
    <div class="section position-relative mt-4">
        <div class="container">

            <!-- Section Title & Tab Start -->
            {{-- <div class="row" data-aos="fade-up" data-aos-duration="1000">
                <!-- Tab Start -->
                <div class="col-12">
                    <ul class="product-tab-nav nav justify-content-center m-b-n15 p-b-40 title-border-bottom">
                        <li class="nav-item m-b-15"><a class="nav-link active" data-bs-toggle="tab"
                                href="#tab-product-all">Bestseller</a></li>
                        <li class="nav-item m-b-15"><a class="nav-link" data-bs-toggle="tab"
                                href="#tab-product-featured">Sales popup</a></li>
                        <li class="nav-item m-b-15"><a class="nav-link" data-bs-toggle="tab"
                                href="#tab-product-all">Top collection</a></li>
                    </ul>
                </div>
                <!-- Tab End -->
            </div> --}}
            <!-- Section Title & Tab End -->

            <!-- Products Tab Start -->
            <div class="row" data-aos="fade-up" data-aos-duration="1100">
                <div class="col-12">
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="tab-product-all">
                            <div class="row m-b-n40">

                                <!-- Product Start -->
                                @foreach ($produk as $pro)

                                    <div class="col-12 col-sm-6 col-lg-3 product-wrapper mb-40">
                                        <div class="product">
                                            <!-- Thumb Start  -->
                                            <div class="thumb">
                                                <a href="single-product.html" class="image">
                                                    <img class="fit-image"
                                                        src="{{ asset('gambar/produk/' . $pro->gambar_produk) }}" />
                                                </a>
                                                {{-- <span class="badges">
                                                    <span class="sale">-18%</span>
                                                </span> --}}
                                                <div class="action-wrapper">
                                                    <a href="#cart{{ $pro->id_produk }}" class="action quickview"
                                                        data-bs-toggle="modal" data-bs-target="#cart{{ $pro->id_produk }}"
                                                        title="Quickview"><i class="ti-shopping-cart"></i></a>
                                                    <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                            class="ti-eye"></i></a>
                                                    {{-- <a href="cart.html" class="action cart" title="Cart"><i
                                                            class="ti-shopping-cart"></i></a> --}}
                                                </div>
                                            </div>
                                            <!-- Thumb End  -->

                                            <!-- Content Start  -->
                                            <div class="content">
                                                <h5 class="title"><a href="single-product.html">An Animal
                                                        Album</a></h5>
                                                <span class="rating">
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </span>
                                                <span class="price">
                                                    <span class="new">$80.50</span>
                                                    <span class="old">$85.80</span>
                                                </span>
                                            </div>
                                            <!-- Content End  -->
                                        </div>
                                    </div>
                                    <!-- Product End -->
                                @endforeach



                            </div>
                        </div>

                        {{-- <div class="tab-pane fade" id="tab-product-featured">
                            <div class="row m-b-n40">

                                <!-- Product Start -->
                                <div class="col-12 col-sm-6 col-lg-3 product-wrapper m-b-40">
                                    <div class="product">
                                        <!-- Thumb Start  -->
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img class="fit-image"
                                                    src="{{ asset('amber/') }}/images/products/medium-product/5.png"
                                                    alt="Product" />
                                            </a>
                                            <span class="badges">
                                                <span class="sale">-18%</span>
                                            </span>
                                            <div class="action-wrapper">
                                                <a href="#/" class="action quickview" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view"><i class="ti-plus"></i></a>
                                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                        class="ti-heart"></i></a>
                                                <a href="cart.html" class="action cart" title="Cart"><i
                                                        class="ti-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                        <!-- Thumb End  -->

                                        <!-- Content Start  -->
                                        <div class="content">
                                            <h5 class="title"><a href="single-product.html">Pet Leaving
                                                    House</a></h5>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <span class="price">
                                                <span class="new">$47.50</span>
                                                <span class="old">$50.00</span>
                                            </span>
                                        </div>
                                        <!-- Content End  -->
                                    </div>
                                </div>
                                <!-- Product End -->

                                <!-- Product Start -->
                                <div class="col-12 col-sm-6 col-lg-3 product-wrapper m-b-40">
                                    <div class="product">
                                        <!-- Thumb Start  -->
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img class="fit-image"
                                                    src="{{ asset('amber/') }}/images/products/medium-product/6.png"
                                                    alt="Product" />
                                            </a>
                                            <span class="badges">
                                                <span class="sale">-20%</span>
                                            </span>
                                            <div class="action-wrapper">
                                                <a href="#/" class="action quickview" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view"><i class="ti-plus"></i></a>
                                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                        class="ti-heart"></i></a>
                                                <a href="cart.html" class="action cart" title="Cart"><i
                                                        class="ti-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                        <!-- Thumb End  -->

                                        <!-- Content Start  -->
                                        <div class="content">
                                            <h5 class="title"><a href="single-product.html">Pet Leaving
                                                    House</a></h5>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <span class="price">
                                                <span class="new">$58.50</span>
                                                <span class="old">$62.85</span>
                                            </span>
                                        </div>
                                        <!-- Content End  -->
                                    </div>
                                </div>
                                <!-- Product End -->

                                <!-- Product Start -->
                                <div class="col-12 col-sm-6 col-lg-3 product-wrapper m-b-40">
                                    <div class="product">
                                        <!-- Thumb Start  -->
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img class="fit-image"
                                                    src="{{ asset('amber/') }}/images/products/medium-product/3.png"
                                                    alt="Product" />
                                            </a>
                                            <span class="badges">
                                                <span class="new">New</span>
                                            </span>
                                            <div class="action-wrapper">
                                                <a href="#/" class="action quickview" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view"><i class="ti-plus"></i></a>
                                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                        class="ti-heart"></i></a>
                                                <a href="cart.html" class="action cart" title="Cart"><i
                                                        class="ti-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                        <!-- Thumb End  -->

                                        <!-- Content Start  -->
                                        <div class="content">
                                            <h5 class="title"><a href="single-product.html">Wait, You Need
                                                    This</a></h5>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <span class="price">
                                                <span class="new">$90.00</span>
                                            </span>
                                        </div>
                                        <!-- Content End  -->
                                    </div>
                                </div>
                                <!-- Product End -->

                                <!-- Product Start -->
                                <div class="col-12 col-sm-6 col-lg-3 product-wrapper m-b-40">
                                    <div class="product">
                                        <!-- Thumb Start  -->
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img class="fit-image"
                                                    src="{{ asset('amber/') }}/images/products/medium-product/7.png"
                                                    alt="Product" />
                                            </a>
                                            <span class="badges">
                                                <span class="new">New</span>
                                            </span>
                                            <div class="action-wrapper">
                                                <a href="#/" class="action quickview" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view"><i class="ti-plus"></i></a>
                                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                        class="ti-heart"></i></a>
                                                <a href="cart.html" class="action cart" title="Cart"><i
                                                        class="ti-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                        <!-- Thumb End  -->

                                        <!-- Content Start  -->
                                        <div class="content">
                                            <h5 class="title"><a href="single-product.html">This is the
                                                    testing</a></h5>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <span class="price">
                                                <span class="new">$78.50</span>
                                            </span>
                                        </div>
                                        <!-- Content End  -->
                                    </div>
                                </div>
                                <!-- Product End -->

                                <!-- Product Start -->
                                <div class="col-12 col-sm-6 col-lg-3 product-wrapper m-b-40">
                                    <div class="product">
                                        <!-- Thumb Start  -->
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img class="fit-image"
                                                    src="{{ asset('amber/') }}/images/products/medium-product/8.png"
                                                    alt="Product" />
                                            </a>
                                            <div class="action-wrapper">
                                                <a href="#/" class="action quickview" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view"><i class="ti-plus"></i></a>
                                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                        class="ti-heart"></i></a>
                                                <a href="cart.html" class="action cart" title="Cart"><i
                                                        class="ti-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                        <!-- Thumb End  -->

                                        <!-- Content Start  -->
                                        <div class="content">
                                            <h5 class="title"><a href="single-product.html">Basic Dog
                                                    Trainning</a></h5>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <span class="price">
                                                <span class="new">$55.00</span>
                                            </span>
                                        </div>
                                        <!-- Content End  -->
                                    </div>
                                </div>
                                <!-- Product End -->

                                <!-- Product Start -->
                                <div class="col-12 col-sm-6 col-lg-3 product-wrapper m-b-40">
                                    <div class="product">
                                        <!-- Thumb Start  -->
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img class="fit-image"
                                                    src="{{ asset('amber/') }}/images/products/medium-product/1.png"
                                                    alt="Product" />
                                            </a>
                                            <span class="badges">
                                                <span class="sale">-18%</span>
                                            </span>
                                            <div class="action-wrapper">
                                                <a href="#/" class="action quickview" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view" title="Quickview"><i
                                                        class="ti-plus"></i></a>
                                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                        class="ti-heart"></i></a>
                                                <a href="cart.html" class="action cart" title="Cart"><i
                                                        class="ti-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                        <!-- Thumb End  -->

                                        <!-- Content Start  -->
                                        <div class="content">
                                            <h5 class="title"><a href="single-product.html">An Animal
                                                    Album</a></h5>
                                            <span class="rating">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <span class="price">
                                                <span class="new">$80.50</span>
                                                <span class="old">$85.80</span>
                                            </span>
                                        </div>
                                        <!-- Content End  -->
                                    </div>
                                </div>
                                <!-- Product End -->

                                <!-- Product Start -->
                                <div class="col-12 col-sm-6 col-lg-3 product-wrapper m-b-40">
                                    <div class="product">
                                        <!-- Thumb Start  -->
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img class="fit-image"
                                                    src="{{ asset('amber/') }}/images/products/medium-product/2.png"
                                                    alt="Product" />
                                            </a>
                                            <span class="badges">
                                                <span class="sale">-20%</span>
                                            </span>
                                            <div class="action-wrapper">
                                                <a href="#/" class="action quickview" title="Quickview"
                                                    data-bs-toggle="modal" data-bs-target="#quick-view"><i
                                                        class="ti-plus"></i></a>
                                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                        class="ti-heart"></i></a>
                                                <a href="cart.html" class="action cart" title="Cart"><i
                                                        class="ti-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                        <!-- Thumb End  -->

                                        <!-- Content Start  -->
                                        <div class="content">
                                            <h5 class="title"><a href="single-product.html">Animal For
                                                    Life</a></h5>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <span class="price">
                                                <span class="new">$75.50</span>
                                                <span class="old">$82.85</span>
                                            </span>
                                        </div>
                                        <!-- Content End  -->
                                    </div>
                                </div>
                                <!-- Product End -->

                                <!-- Product Start -->
                                <div class="col-12 col-sm-6 col-lg-3 product-wrapper m-b-40">
                                    <div class="product">
                                        <!-- Thumb Start  -->
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img class="fit-image"
                                                    src="{{ asset('amber/') }}/images/products/medium-product/4.png"
                                                    alt="Product" />
                                            </a>
                                            <div class="action-wrapper">
                                                <a href="#/" class="action quickview" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view"><i class="ti-plus"></i></a>
                                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                        class="ti-heart"></i></a>
                                                <a href="cart.html" class="action cart" title="Cart"><i
                                                        class="ti-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                        <!-- Thumb End  -->

                                        <!-- Content Start  -->
                                        <div class="content">
                                            <h5 class="title"><a href="single-product.html">Pet Food
                                                    Corner</a></h5>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <span class="price">
                                                <span class="new">$105.00</span>
                                            </span>
                                        </div>
                                        <!-- Content End  -->
                                    </div>
                                </div>
                                <!-- Product End -->

                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
            <!-- Products Tab End -->
        </div>
    </div>
    <!-- Product Section End -->

    @foreach ($produk as $p)

        <!-- Modal Start  -->
        <div class="modalquickview modal fade" id="cart{{ $p->id_produk }}" tabindex="-1" aria-labelledby="quick-view"
            role="dialog" aria-hidden="true">
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
                                                src="{{ asset('gambar/produk/' . $p->gambar_produk) }}" alt="Product">
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
                                            <input type="radio" value="31" name="ukuran" checked id=""> 31
                                            <input type="radio" value="32" name="ukuran" id=""> 32
                                            <input type="radio" value="33" name="ukuran" id=""> 33
                                            <input type="radio" value="34" name="ukuran" id=""> 34


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
                                                <button type="submit" class="btn btn-primary btn-hover-dark rounded-0">Add
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
