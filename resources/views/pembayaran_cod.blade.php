@extends('layouts.app2')
@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="section breadcrumb-area bg-name-bright">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-wrapper">
                        <h2 class="breadcrumb-title">Metode Bayar COD</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>COD</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Contact Us Section Start -->
    <div class="section section-margin">
        <div class="container">

            <div class="row m-b-n50">
                <div class="col-12 col-lg-6 m-b-50 order-2 order-lg-1" data-aos="fade-up" data-aos-duration="1000">

                    <!-- Section Title Start -->
                    <div class="contact-title p-b-15">
                        <h2 class="title">Upload Bukti Barang COD</h2>
                    </div>
                    <!-- Section Title End -->

                    <!-- Contact Form Wrapper Start -->
                    <div class="contact-form-wrapper contact-form">
                        <form action="/update-pembayaran-cod" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_order" value="{{ $order->id_order }}" id="">
                            <div class="row">

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <h5>Total Bayar: Rp <p>{{ number_format($order->total_bayar, 0, ',', '.') }}
                                                </p>


                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-area m-b-20">
                                                <input class="input-item" type="file" name="bukti_bayar">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary btn-hover-dark">Kirim Penerimaan
                                                Barang</button>
                                        </div>
                                        {{-- <p class="col-8 form-message mb-0"></p> --}}

                                    </div>
                                </div>
                            </div>
                        </form>
                        {{-- <p class="form-messege"></p> --}}
                    </div>
                    <!-- Contact Form Wrapper End -->

                </div>
                <div class="col-12 col-lg-6 m-b-50 order-1 order-lg-2" data-aos="fade-up" data-aos-duration="1500">
                    <!-- Section Title Start -->
                    <div class="contact-title p-b-15">
                        <h2 class="title">Detail COD</h2>
                    </div>
                    @if ($order->status_bayar == 0)
                        <div class="about-thumb">
                            <img class="fit-image" src="{{ asset('amber/') }}/images/about/1.png" alt="About Image">
                        </div>
                    @else
                        <div class="about-thumb">
                            <img class="fit-image" width="50px"
                                src="{{ asset('gambar/bukti_bayar/' . $order->bukti_terima) }}">
                        </div>
                    @endif
                    <!-- Section Title End -->
                    {{-- <div class="contact-content">
                        <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est
                            notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas
                            human.</p>
                        <address class="contact-block">
                            <ul>
                                <li><i class="fa fa-fax"></i> Your address goes here</li>
                                <li><i class="fa fa-phone"></i> <a href="tel:123-123-456-789">123 123 456 789</a></li>
                                <li><i class="fa fa-envelope-o"></i> <a href="mailto:demo@example.com">demo@example.com </a>
                                </li>
                            </ul>
                        </address>

                        <div class="working-time">
                            <h6 class="title">Working Hours</h6>
                            <p>Monday – Saturday:08AM – 22PM</p>
                        </div>

                    </div> --}}
                </div>
            </div>

        </div>
    </div>
    <!-- Contact us Section End -->
@endsection
