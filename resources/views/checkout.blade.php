@extends('layouts.app2')
@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="section breadcrumb-area bg-name-bright">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-wrapper">
                        <h2 class="breadcrumb-title">Checkout</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Checkout Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Coupon Accordion Start -->
                    <div class="coupon-accordion">

                        <!-- Title Start -->
                        {{-- <h3 class="title">Returning customer? <span id="showlogin">Click here to login</span></h3> --}}
                        <!-- Title End -->

                        <!-- Checkout Login Start -->
                        {{-- <div id="checkout-login" class="coupon-content">
                            <div class="coupon-info">
                                <p class="coupon-text m-b-10">Quisque gravida turpis sit amet nulla posuere lacinia. Cras
                                    sed est sit amet ipsum luctus.</p>

                                <!-- Form Start -->
                                <form action="#">
                                    <!-- Input Email Start -->
                                    <p class="form-row-first">
                                        <label>Username or email <span class="required">*</span></label>
                                        <input type="text">
                                    </p>
                                    <!-- Input Email End -->

                                    <!-- Input Password Start -->
                                    <p class="form-row-last">
                                        <label>Password <span class="required">*</span></label>
                                        <input type="password">
                                    </p>
                                    <!-- Input Password End -->

                                    <!-- Remember Password Start -->
                                    <p class="form-row m-b-10">
                                        <input type="checkbox" id="remember_me">
                                        <label for="remember_me" class="checkbox-label">Remember me</label>
                                    </p>
                                    <!-- Remember Password End -->

                                    <!-- Lost Password Start -->
                                    <p class="lost-password"><a href="#">Lost your password?</a></p>
                                    <!-- Lost Password End -->

                                </form>
                                <!-- Form End -->

                            </div>
                        </div> --}}
                        <!-- Checkout Login End -->

                        <!-- Title Start -->
                        {{-- <h3 class="title">Have a coupon? <span id="showcoupon">Click here to enter your code</span>
                        </h3> --}}
                        <!-- Title End -->

                        <!-- Checkout Coupon Start -->
                        {{-- <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <form action="#">
                                    <p class="checkout-coupon d-flex">
                                        <input placeholder="Coupon code" type="text">
                                        <input class="btn btn-primary btn-hover-dark rounded-0" value="Apply Coupon"
                                            type="submit">
                                    </p>
                                </form>
                            </div>
                        </div> --}}
                        <!-- Checkout Coupon End -->

                    </div>
                    <!-- Coupon Accordion End -->
                </div>
            </div>
            <div class="row m-b-n20">
                <div class="col-lg-6 col-12 m-b-20">

                    <!-- Checkbox Form Start -->
                    <form action="#">
                        <div class="checkbox-form">

                            <!-- Checkbox Form Title Start -->
                            <h3 class="title">Alamat Kirim</h3>
                            <!-- Checkbox Form Title End -->

                            <div class="row">
                                <div class="col-md-12" style="border:3px solid #dee2e6 !important;">
                                    <p>{{ $alamat->alamat }}, Kec. {{ $alamat->kecamatan }}, Kab.
                                        {{ $alamat->kabupaten }}, <br>{{ $alamat->provinsi }}</p>
                                    <p>No Hp: {{ $alamat->no_hp }}</p>
                                    <a href="/my-account" class="btn btn-sm btn-warning mb-3">Ganti Alamat</a>
                                </div>

                            </div>

                            <!-- Different Address Start -->
                            <div class="different-address">
                                <!-- Order Notes Textarea Start -->
                                {{-- <div class="order-notes m-t-15 m-b-n10">
                                    <div class="checkout-form-list checkout-form-list-2">
                                        <label>Order Notes</label>
                                        <textarea id="checkout-mess" cols="30" rows="10"
                                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div> --}}
                                <!-- Order Notes Textarea End -->

                            </div>
                            <!-- Different Address End -->
                        </div>
                    </form>
                    <!-- Checkbox Form End -->

                </div>

                <div class="col-lg-6 col-12 m-b-20">

                    <!-- Your Order Area Start -->
                    <div class="your-order-area border">

                        <!-- Title Start -->
                        <h3 class="title">Your order</h3>
                        <!-- Title End -->

                        <!-- Your Order Table Start -->
                        <div class="your-order-table table-responsive">
                            <table class="table">

                                <!-- Table Head Start -->
                                <thead>
                                    <tr class="cart-product-head">
                                        <th class="cart-product-name text-start">Product</th>
                                        <th class="cart-product-total text-end">SubTotal</th>
                                    </tr>
                                </thead>
                                <!-- Table Head End -->

                                <!-- Table Body Start -->
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($cart as $c)
                                        @php
                                            $jumlah = $c->jumlah;
                                            $harga = $c->harga;
                                            $total += $harga * $jumlah;
                                        @endphp

                                        <tr class="cart_item">
                                            <td class="cart-product-name text-start ps-0"> {{ $c->nm_produk }}<strong
                                                    class="product-quantity"> × {{ $c->jumlah }}</strong></td>
                                            <td class="cart-product-total text-end pe-0"><span class="amount">Rp.
                                                    {{ number_format($c->harga * $c->jumlah) }}</span></td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>Ongkir</td>
                                        <td class="cart-product-total text-end pe-0"><span class="amount">
                                                @php
                                                    $id_kecamatan = $alamat->id_kecamatan;
                                                    $ongkir = App\Models\Ongkir::where('id_kecamatan', $id_kecamatan)->first();
                                                @endphp
                                                Rp. {{ number_format($ongkir->ongkir, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td class="cart-product-total text-end pe-0"><span class="amount">Rp.
                                                {{ number_format($total + $ongkir->ongkir) }}</span></td>

                                    </tr>

                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <!-- Payment Accordion Order Button Start -->
                        <form action="/add_order" method="post">
                            @csrf
                            <input type="hidden" name="total_bayar" value="{{ $total + $ongkir->ongkir }}" id="">
                            <input type="hidden" name="ongkir" value="{{ $ongkir->ongkir }}" id="">

                            <div class="payment-accordion-order-button">
                                <div class="payment-accordion">
                                    <div class="single-payment">
                                        <h5 class="panel-title m-b-15">
                                            <a class="collapse-off" data-bs-toggle="collapse" href="#collapseExample"
                                                aria-expanded="false" aria-controls="collapseExample">
                                                Metode Bayar
                                            </a>
                                        </h5>
                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body rounded-0">
                                                <div class="form-group">
                                                    <select name="metode_bayar" class="form-control" id="">
                                                        <option value="">Pilih Bank</option>
                                                        <option value="Bank BRI">Bank BRI</option>
                                                        <option value="Bank BCA">Bank BCA</option>
                                                        <option value="COD">COD</option>



                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="single-payment">
                                    <h5 class="panel-title m-b-15">
                                        <a class="collapse-off" data-bs-toggle="collapse" href="#collapseExample-2"
                                            aria-expanded="false" aria-controls="collapseExample-2">
                                            Cheque Payment.
                                        </a>
                                    </h5>
                                    <div class="collapse" id="collapseExample-2">
                                        <div class="card card-body rounded-0">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as
                                                the payment reference. Your order won’t be shipped until the funds have
                                                cleared in our account.</p>
                                        </div>
                                    </div>
                                </div> --}}
                                    {{-- <div class="single-payment">
                                    <h5 class="panel-title m-b-15">
                                        <a class="collapse-off" data-bs-toggle="collapse" href="#collapseExample-3"
                                            aria-expanded="false" aria-controls="collapseExample-3">
                                            Paypal.
                                        </a>
                                    </h5>
                                    <div class="collapse" id="collapseExample-3">
                                        <div class="card card-body rounded-0">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as
                                                the payment reference. Your order won’t be shipped until the funds have
                                                cleared in our account.</p>
                                        </div>
                                    </div>
                                </div> --}}
                                </div>
                                <div class="order-button-payment">
                                    <button type="submit"
                                        class="btn btn-primary btn-hover-dark rounded-0 w-100">Order</button>
                                </div>
                            </div>
                        </form>
                        <!-- Payment Accordion Order Button End -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
