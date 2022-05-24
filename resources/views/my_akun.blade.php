@extends('layouts.app2')
@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="section breadcrumb-area bg-name-bright">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-wrapper">
                        <h2 class="breadcrumb-title">My Account</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>My Account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- My Account Section Start -->
    <div class="section section-margin">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session()->has('pesan'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('pesan') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <h3>Validasi Error</h3>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <div class="row">

                            <!-- My Account Tab Menu Start -->
                            <div class="col-lg-3 col-md-4">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="#dashboad" class="active" data-bs-toggle="tab"><i
                                            class="fa fa-dashboard"></i>
                                        Dashboard</a>
                                    <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i>Riwayat
                                        Orders</a>
                                    {{-- <a href="#download" data-bs-toggle="tab"><i class="fa fa-cloud-download"></i>
                                        Download</a>
                                    <a href="#payment-method" data-bs-toggle="tab"><i class="fa fa-credit-card"></i> Payment
                                        Method</a> --}}
                                    <a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i>
                                        Alamat</a>
                                    <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i>
                                        Akun</a>
                                    <a href="#account-change-password" data-bs-toggle="tab"><i class="fa fa-key"></i>
                                        Ganti Password</a>
                                    {{-- <a href="login.html"><i class="fa fa-sign-out"></i> Logout</a> --}}
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->

                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3 class="title">Dashboard</h3>
                                            <div class="welcome">
                                                {{-- <p>Hello, <strong>{{ $alamat->name }}</strong> (If Not
                                                    <strong>{{ $alamat->name }}!</strong><a href="/logout"
                                                        class="logout"> Logout</a>)
                                                </p> --}}
                                            </div>
                                            <p class="mb-0">From your account dashboard. you can easily check &
                                                view your recent orders, manage your shipping and billing addresses and edit
                                                your password and account details.</p>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="orders" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3 class="title">Riwayat Orders</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Produk</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $no = 1;
                                                        @endphp
                                                        @foreach ($riwayat as $rw)
                                                            @php
                                                                $id_order = $rw->id_order;
                                                                $produk = App\Models\OrderDetail::where('tb_detail_order.id_order', $id_order)
                                                                    ->leftjoin('tb_produk', 'tb_produk.id_produk', '=', 'tb_detail_order.id_produk')
                                                                    ->get();
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>
                                                                    <table class="table table-hover">
                                                                        <thead>
                                                                            <th>Nama Produk</th>
                                                                            <th>Stok</th>
                                                                            <th>Jumlah Order</th>
                                                                        </thead>
                                                                        @foreach ($produk as $pr)
                                                                            <tbody>

                                                                                <tr>
                                                                                    <td>{{ $pr->nm_produk }}</td>
                                                                                    <td>{{ $pr->stok }}</td>
                                                                                    <td>{{ $pr->jumlah_order }}</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        @endforeach

                                                                    </table>
                                                                </td>
                                                                <td>{{ date('d F Y', strtotime($rw->created_at)) }}</td>

                                                                <td>
                                                                    <a href="#/" class="action quickview"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#status{{ $rw->id_order }}"
                                                                        title="Quickview">Lunas</a>
                                                                </td>
                                                                <td>Rp. {{ number_format($rw->total_bayar, 0, ',', '.') }}
                                                                </td>

                                                                <td>
                                                                    <a href="/riwayat-order/{{ $rw->id_order }}"
                                                                        class="btn btn btn-dark btn-hover-primary btn-sm rounded-0">View
                                                                    </a>
                                                                    <a href="/faktur_order/{{ $rw->id_order }}"
                                                                        class="btn btn btn-dark btn-hover-primary btn-sm rounded-0">Faktur
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="download" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3 class="title">Downloads</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Date</th>
                                                            <th>Expire</th>
                                                            <th>Download</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Haven - Free Real Estate PSD Template</td>
                                                            <td>Aug 22, 2018</td>
                                                            <td>Yes</td>
                                                            <td><a href="#"
                                                                    class="btn btn btn-dark btn-hover-primary rounded-0"><i
                                                                        class="fa fa-cloud-download m-r-5"></i> Download
                                                                    File</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>TechWorld - Profolio Business Template</td>
                                                            <td>Sep 12, 2018</td>
                                                            <td>Never</td>
                                                            <td><a href="#"
                                                                    class="btn btn btn-dark btn-hover-primary rounded-0"><i
                                                                        class="fa fa-cloud-download m-r-5"></i> Download
                                                                    File</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    {{-- <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3 class="title">Payment Method</h3>
                                            <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                        </div>
                                    </div> --}}
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                        <div class="myaccount-content">
                                            {{-- <div class="mb-5">
                                                <a href="" class="btn btn-primary btn-sm">+</a>
                                            </div> --}}
                                            <h3 class="title">Alamat Kirim</h3>
                                            <address>
                                                <p><strong>{{ $alamat->name }}</strong></p>
                                                @if ($alamat->id_provinsi == null)
                                                    <p>Alamat Kirim Belum Diinputkan</p>
                                                @else
                                                    <p>{{ $alamat->alamat }}, Kec. {{ $alamat->kecamatan }}, Kab.
                                                        {{ $alamat->kabupaten }}, <br>{{ $alamat->provinsi }}</p>
                                                    <p>No Hp: {{ $alamat->no_hp }}</p>
                                                @endif
                                            </address>

                                            {{-- <a href="#" class="btn btn btn-dark btn-hover-primary rounded-0"><i
                                                    class="fa fa-edit m-r-10" data-bs-toggle="modal"
                                                    data-bs-target="#cart"></i>Edit Address</a> --}}
                                            <a href="#cart"
                                                class="btn btn btn-dark
                                                btn-hover-primary rounded-0"
                                                data-bs-toggle="modal" data-bs-target="#cart" title="Quickview"><i
                                                    class="fa fa-edit m-r-10" data-bs-toggle="modal"
                                                    data-bs-target="#cart"></i>Edit Address</a>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->


                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3 class="title">Account Details</h3>
                                            <div class="account-details-form">
                                                <form action="/edit-profile" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="single-input-item m-b-15">
                                                                <label for="first-name" class="required m-b-10">Nama</label>
                                                                <input type="text" name="nama" id="first-name"
                                                                    placeholder="First Name" value="{{ $user->name }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-input-item m-b-15">
                                                        <label for="email" class="required m-b-5">Email Addres</label>
                                                        <input type="email" id="email" placeholder="Email Address" readonly
                                                            value="{{ $user->email }}" />
                                                    </div>
                                                    <fieldset>
                                                        <legend>Foto Profil</legend>
                                                        <div class="single-input-item m-b-15">

                                                            <div>
                                                                <img src="{{ asset('profile/' . $user->foto) }}"
                                                                    width="150px" alt="">
                                                            </div>

                                                        </div>
                                                        <div class="row m-b-n15">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item m-b-15">
                                                                    <label for="new-pwd" class="required m-b-10">Ganti
                                                                        Foto</label>
                                                                    <input type="file" name="foto" id="new-pwd"
                                                                        placeholder="New Password" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item m-b-15">
                                                                    {{-- <label for="confirm-pwd" class="required m-b-10">Confirm
                                                                        Password</label>
                                                                    <input type="password" id="confirm-pwd"
                                                                        placeholder="Confirm Password" /> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="single-input-item single-item-button m-t-30">
                                                        <button class="btn btn btn-primary btn-hover-dark rounded-0">Save
                                                            Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="account-change-password" role="tabpanel">
                                        <div class="myaccount-content">
                                            {{-- <h3 class="title">Ganti Password</h3> --}}
                                            <div class="account-details-form">
                                                <form action="/ganti-password" method="post">
                                                    @csrf
                                                    <div class="row">

                                                        <fieldset>
                                                            <legend>Ganti Password</legend>
                                                            {{-- <div class="single-input-item m-b-15">
                                                                <label for="current-pwd" class="required m-b-10">Current
                                                                    Password</label>
                                                                <input type="password" name="password_lama" id="current-pwd"
                                                                    placeholder="Current Password" />
                                                            </div>
                                                            @error('password_lama')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror --}}
                                                            <div class="row m-b-n15">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item m-b-15">
                                                                        <label for="new-pwd" class="required m-b-10">New
                                                                            Password</label>
                                                                        <input type="password" name="password_baru"
                                                                            id="new-pwd" placeholder="New Password" />
                                                                        @error('password_baru')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item m-b-15">
                                                                        <label for="confirm-pwd"
                                                                            class="required m-b-10">Confirm
                                                                            Password</label>
                                                                        <input type="password" name="konfirmasi_password"
                                                                            id="confirm-pwd"
                                                                            placeholder="Confirm Password" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="single-input-item single-item-button m-t-30">
                                                            <button
                                                                class="btn btn btn-primary btn-hover-dark rounded-0">Save
                                                                Changes</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                </div>
                            </div>
                            <!-- My Account Tab Content End -->

                        </div>
                    </div>
                    <!-- My Account Page End -->

                </div>
            </div>

        </div>
    </div>
    <!-- My Account Section End -->
    <div class="modalquickview modal fade" id="cart" tabindex="-1" aria-labelledby="quick-view" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="btn close" data-bs-dismiss="modal">×</button>
                <h3>Edit Alamat</h3>
                <form action="/edit_alamat" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Provinsi</label>
                                <select name="provinsi" id="provinsi" class="form-control">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinsi as $pr)
                                        <option value="{{ $pr->id }}">{{ $pr->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Kabupaten</label>
                                <select name="kabupaten" id="kabupaten" class="form-control">
                                    <option value="">Pilih Kabupaten</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Kecamatan</label>
                                <select name="kecamatan" id="kecamatan" class="form-control">
                                    <option value="">Pilih Provinsi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Alamat Rumah</label>
                                <textarea name="alamat" class="form-control" id="" cols="20" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">No Hp</label>
                                <input type="text" class="form-control" name="no_hp" id="">
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- status --}}
    @foreach ($riwayat as $rw)
        <div class="modalquickview modal fade" id="status{{ $rw->id_order }}" tabindex="-1" aria-labelledby="quick-view"
            role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-sm modal-dialog-centered">
                <div class="modal-content">
                    <button class="btn close" data-bs-dismiss="modal">×</button>
                    <h3>Bukti Order</h3>
                    <center><img src="{{ asset('gambar/bukti_bayar/' . $rw->bukti_bayar) }}" style="width:250px;">
                    </center>

                </div>
            </div>
        </div>
    @endforeach
    <script>
        $(document).ready(function() {
            $("#provinsi").change(function() {
                var id = $(this).val();
                console.log(id);
                $.ajax({
                    type: "GET",
                    url: "/ajax_provinsi/" + id,
                    // async: false,
                    // dataType: 'json',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        // console.log(data);
                        // var html = '';
                        // var i;
                        // for (i = 0; i < data.length; i++) {
                        //     html += '<option value=' + data[i].city_id + '>' + data[i].city_name + '</option>';
                        // }
                        $('#kabupaten').html(data);

                    }
                });
            });
        });
        $(document).ready(function() {
            $("#kabupaten").change(function() {
                var id = $(this).val();
                console.log(id);
                $.ajax({
                    type: "GET",
                    url: "/ajax_kabupaten/" + id,
                    // async: false,
                    // dataType: 'json',

                    success: function(data) {
                        // console.log(data);
                        // var html = '';
                        // var i;
                        // for (i = 0; i < data.length; i++) {
                        //     html += '<option value=' + data[i].city_id + '>' + data[i].city_name + '</option>';
                        // }
                        $('#kecamatan').html(data);

                    }
                });
            });
        });
    </script>

@endsection
