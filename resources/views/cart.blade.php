@extends('layouts.app2')
@section('content')

    <!-- Breadcrumb Area Start -->
    <div class="section breadcrumb-area bg-name-bright">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-wrapper">
                        <h2 class="breadcrumb-title">Wishlist</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Wishlist</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Shopping Cart Section Start -->
    <div class="section section-margin">
        <div class="container">

            <div class="row">
                <div class="col-12">

                    <!-- Cart Table Start -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">

                            <!-- Table Head Start -->
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">SubTotal</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <!-- Table Head End -->

                            <!-- Table Body Start -->
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($cart as $k)
                                    @php
                                        $jumlah = $k->jumlah;
                                        $harga = $k->harga;
                                        $total += $jumlah * $harga;
                                    @endphp

                                    <tr>
                                        <td class="pro-thumbnail"><a href="#"><img class="fit-image"
                                                    src="{{ asset('gambar/produk/' . $k->gambar_produk) }}"
                                                    alt="Product" /></a>
                                        </td>
                                        <td class="pro-title"><a href="#">{{ $k->nm_produk }}</a></td>
                                        <td class="pro-price"><span>Rp.
                                                {{ number_format($k->harga, 0, ',', '.') }}</span>
                                        </td>
                                        <td class="pro-quantity">
                                            <div class="quantity">
                                                <div class="cart-plus-minus">
                                                    <input type="hidden" id="id_keranjang" value="{{ $k->id_keranjang }}">

                                                    <input class="cart-plus-minus-box" id="qty" value="{{ $k->jumlah }}"
                                                        type="text">
                                                    <div class="dec qtybutton">-</div>
                                                    <div class="inc qtybutton">+</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pro-subtotal"><span>Rp.
                                                {{ number_format($k->jumlah * $k->harga, 0, ',', '.') }}</span></td>
                                        <td class="pro-remove"><a href="/delete-cart/{{ $k->id_keranjang }}"><i
                                                    class="ti-trash"></i></a></td>
                                    </tr>
                                @endforeach


                            </tbody>
                            <!-- Table Body End -->

                        </table>
                    </div>
                    <!-- Cart Table End -->

                    <!-- Cart Button Start -->
                    <div class="cart-button-section m-b-n20">

                        <!-- Cart Button left Side Start -->
                        <div class="cart-btn-lef-side m-b-20">
                            <a href="/" class="btn btn btn-gray-deep btn-hover-primary">Continue Shopping</a>
                            <a href="#" class="btn btn btn-gray-deep btn-hover-primary">Update Shopping Cart</a>
                        </div>
                        <!-- Cart Button left Side End -->

                        <!-- Cart Button Right Side Start -->
                        <div class="cart-btn-right-right m-b-20">
                            <a href="#" class="btn btn btn-gray-deep btn-hover-primary">Clear Shopping Cart</a>
                        </div>
                        <!-- Cart Button Right Side End -->

                    </div>
                    <!-- Cart Button End -->

                </div>
            </div>

            <div class="row m-t-50">
                <div class="col-lg-6 me-0 ms-auto">

                    <!-- Cart Calculation Area Start -->
                    <div class="cart-calculator-wrapper">

                        <!-- Cart Calculate Items Start -->
                        <div class="cart-calculate-items">

                            <!-- Cart Calculate Items Title Start -->
                            <h3 class="title">Cart Totals</h3>
                            <!-- Cart Calculate Items Title End -->

                            <!-- Responsive Table Start -->
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Total</td>
                                        <td>Rp. {{ number_format($total, 0, ',', '.') }}</td>
                                    </tr>
                                </table>
                            </div>
                            <!-- Responsive Table End -->

                        </div>
                        <!-- Cart Calculate Items End -->

                        <!-- Cart Checktout Button Start -->
                        <a href="/checkout" class="btn btn btn-gray-deep btn-hover-primary m-t-30">Proceed To
                            Checkout</a>
                        <!-- Cart Checktout Button End -->

                    </div>
                    <!-- Cart Calculation Area End -->

                </div>
            </div>

        </div>
    </div>
    <!-- Shopping Cart Section End -->
    <script>
        @foreach ($cart as $row)
            $("#qty{{ $row->id_keranjang }}").change(updateCart);
        @endforeach

        function updateCart() {
            var qty = parseInt($(this).val());
            var cat_id = parseInt($('#id_keranjang').val());
            console.log(cat_id);
            console.log(qty);


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'cart/update',
                method: "POST",
                data: {
                    cat_id: cat_id,
                    qty: qty
                },
                success: function(data) {
                    // console.log(data);
                }
            });
        }
    </script>

    <script>
        $(document).on('change', function() {
            var qty = $('#qty').val();
            console.log(qty);
        });
    </script>

@endsection
