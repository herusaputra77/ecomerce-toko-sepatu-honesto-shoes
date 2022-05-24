@extends('admin.app')
@section('judul', 'Ongkos Kirim')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="#tambah" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah
                Kategori</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <th>#</th>
                        <th>Alamat</th>
                        <th>Biaya Ongkir</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($ongkir as $o)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <p>Kec. {{ $o->kecamatan }}, Kab. {{ $o->kabupaten }}, Prov. {{ $o->provinsi }}
                                    </p>
                                </td>
                                <td>{{ $o->ongkir }}</td>
                                <td>
                                    <a href="/admin/hapus-ongkir/{{ $o->id_ongkir }}" class="btn btn-sm btn-danger"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/add-ongkir" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <select name="provinsi" id="provinsi" class="form-control">
                                <option value="">Pilih Provinsi</option>
                                @foreach ($provinsi as $pr)
                                    <option value="{{ $pr->id }}">{{ $pr->nama }}</option>


                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kabupaten</label>
                            <select name="kabupaten" id="kabupaten" class="form-control">
                                <option value="">Pilih Kabupaten</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" class="form-control">
                                <option value="">Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Ongkir</label>
                            <input type="text" name="ongkir" class="form-control" id="">
                        </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </form>
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



@endsection
