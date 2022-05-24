<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="{{ asset('template_backend/') }}/vendor/jquery/jquery.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="{{ asset('template_backend/') }}/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    <form class="user" method="post" action="/add_register">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="nama" value="{{ old('nama') }}"
                                                class="form-control form-control-user" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Masukkan Nama...">
                                        </div>
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                class="form-control form-control-user" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Password">
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="form-group">
                                            <input type="password" name="password2"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Ulangi Password">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Provinsi</label>
                                                    <select name="provinsi" id="provinsi" class="form-control">
                                                        <option value="">Pilih Provinsi</option>
                                                        @foreach ($provinsi as $pr)
                                                            <option value="{{ $pr->id }}">{{ $pr->nama }}
                                                            </option>


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
                                                    <textarea name="alamat" class="form-control" id="" cols="20"
                                                        rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">No Hp</label>
                                                    <input type="text" class="form-control" name="no_hp" id="">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> --}}
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register
                                        </button>

                                    </form>
                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="/login_user">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

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


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template_backend/') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('template_backend/') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template_backend/') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template_backend/') }}/js/sb-admin-2.min.js"></script>

</body>

</html>
