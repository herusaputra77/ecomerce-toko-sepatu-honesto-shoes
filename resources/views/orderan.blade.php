@extends('layouts.app2')
@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="section breadcrumb-area bg-name-bright">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-wrapper">
                        <h2 class="breadcrumb-title">Order List</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Order List</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Shop Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper flex-column flex-md-row p-2 m-b-40 border">

                        <!-- Shop Top Bar Left start -->
                        <div class="shop-top-bar-left">

                            <div class="shop_toolbar_btn">
                                <button data-role="grid_list" type="button" class="active btn-list" title="List"><i
                                        class="ti-align-justify"></i></button>
                                <button data-role="grid_4" type="button" class="btn-grid-4" title="Grid"><i
                                        class="ti-layout-grid4-alt"></i></button>
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
                    <div class="row shop_wrapper grid_list">

                        <!-- Single Product Start -->
                        @foreach ($order as $or)
                            <div class="col-12 product">
                                <div class="product-inner">
                                    <div class="content">
                                        <h5 class="title"><a href="single-product.html">Tanggal Order :
                                                {{ date('d M Y', strtotime($or->created_at)) }}</a></h5>

                                        <span class="price">
                                            <span class="new">Total Pembayaran : </span>
                                            <span class="new">Rp.
                                                {{ number_format($or->total_bayar, 0, ',', '.') }}</span>
                                        </span>
                                        <span class="price">
                                            <span class="new">Metode Bayar : </span>
                                            <span class="new">{{ $or->metode_bayar }}</span>
                                        </span>
                                        <div>
                                            <label for="">Status:
                                                <p>
                                                    @if ($or->status_bayar == 0)
                                                        <span class="new">Belum Bayar</span>
                                                    @elseif ($or->status_bayar == 1)
                                                        <span class="new">Pending</span>
                                                    @else
                                                        <span class="new">Lunas</span>
                                                    @endif
                                                </p>
                                            </label>

                                        </div>
                                        <!-- Cart Button Start -->
                                        <div class="cart-btn action-btn">
                                            <div class="action-cart-btn-wrapper d-flex">
                                                @if ($or->metode_bayar == 'COD')
                                                    <div class="add-to_cart">
                                                        <a class="btn btn-primary btn-hover-dark rounded-0"
                                                            href="/pembayaran-cod/{{ $or->id_order }}">Terima</a>


                                                    </div>
                                                @else
                                                    <div class="add-to_cart">


                                                        <a class="btn btn-primary btn-hover-dark rounded-0"
                                                            href="/pembayaran/{{ $or->id_order }}">Bayar</a>
                                                    </div>
                                                    @if ($or->status_bayar == 2)
                                                        <div class="add-to_cart">
                                                            <a class="btn btn-primary btn-hover-dark rounded-0"
                                                                href="/terima-order/{{ $or->id_order }}">Terima</a>
                                                        </div>
                                                    @endif
                                                @endif


                                                <a href="/detail-order/{{ $or->id_order }}" title="Wishlist"
                                                    class="action"><i class="ti-book"></i></a>
                                                {{-- <a href="#/" class="action quickview" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quickview"><i
                                                    class="ti-plus"></i></a> --}}
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
            </div>
        </div>
    </div>
    <!-- Shop Section End -->
@endsection
