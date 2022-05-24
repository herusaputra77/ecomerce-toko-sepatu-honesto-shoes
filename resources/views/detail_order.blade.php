@extends('layouts.app2')
@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="section breadcrumb-area bg-name-bright">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-wrapper">
                        <h2 class="breadcrumb-title">Detail Order</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Detail Order</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <div class="container">
        <h2>Pengiriman Produk <i class="ti-truck"></i></h2>
        <hr>
        <div class="tabel">
            <table>
                @foreach ($pengiriman as $pe)
                    @if ($pe->status_kirim == null)
                        <tr>
                            <td>{{ date('G:i d/m/Y', strtotime($pe->created_at)) }}</td>
                            <td>:</td>
                            <td>Menunggu Proses Pembayaran</td>
                        </tr>
                    @elseif ($pe->status_kirim == 'Proses')
                        <tr>
                            <td>{{ date('G:i d/m/Y', strtotime($pe->created_at)) }}</td>
                            <td>:</td>
                            <td>Proses Pengiriman</td>
                        </tr>
                    @elseif ($pe->status_kirim == 'Terkirim')
                        <tr>
                            <td>{{ date('G:i d/m/Y', strtotime($pe->created_at)) }}</td>
                            <td>:</td>
                            <td>Terkirim</td>
                        </tr>
                    @else
                        <tr>
                            <td>{{ date('G:i d/m/Y', strtotime($pe->created_at)) }}</td>
                            <td>:</td>
                            <td>Pengiriman Gagal</td>
                        </tr>
                    @endif
                @endforeach

            </table>
        </div>
    </div>

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
                    @foreach ($detail_order as $do)
                        <!-- Shop Wrapper Start -->
                        <div class="row shop_wrapper grid_list">

                            <!-- Single Product Start -->
                            <div class="col-12 product">
                                <div class="product-inner">
                                    <div class="thumb">
                                        <a href="single-product.html" class="image">
                                            <img class="fit-image"
                                                src="{{ asset('gambar/produk/' . $do->gambar_produk) }}" alt="Product" />
                                        </a>
                                        {{-- <span class="badges">
                                            <span class="sale">-18%</span>
                                        </span> --}}
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
                                    <div class="content">
                                        <h5 class="title"><a href="single-product.html">{{ $do->nm_produk }}</a>
                                        </h5>
                                        <span class="rating">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </span>
                                        <span class="price">
                                            <span class="new">Rp {{ number_format($do->harga_order) }}</span>
                                            {{-- <span class="old">$85.80</span> --}}
                                        </span>
                                        <span class="price">
                                            <span class="new">Ukuran :</span>

                                            <span class="new"> {{ $do->ukuran_order }}</span>
                                            {{-- <span class="old">$85.80</span> --}}
                                        </span>
                                        {{-- <p>It is a long established fact that a reader will be distracted by the readable
                                            content of a page when looking at its layout. The point of using Lorem Ipsum is
                                            that
                                            it has a more-or-less normal distribution of letters, as opposed to using
                                            'Content
                                            here, content here', making it look like readable English.</p> --}}
                                        <!-- Cart Button Start -->
                                        {{-- <div class="cart-btn action-btn">
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
                                        </div> --}}
                                        <!-- Cart Button End -->
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->

                        </div>
                        <!-- Shop Wrapper End -->
                    @endforeach


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
