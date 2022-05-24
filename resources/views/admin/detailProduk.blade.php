@extends('admin.app')
@section('judul', 'Detail Produk')
@section('content')
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h2>Ukuran {{ $produk->nm_produk }}</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">

                        <a href="#tambah" data-toggle="modal" class="btn btn-sm btn-primary">Tambah Ukuran</a>
                    </div>
                    <div>
                        <table class="table table-hover">
                            <thead>
                                <th>No</th>
                                <th>Ukuran</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($ukuran as $uk)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $uk->ukuran }}</td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Ukuran</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="/admin/add-detail" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="">Ukuran</label>
                            <input type="hidden" value="{{ $produk->id_produk }}" name="id_produk" id="">
                            <input type="text" class="form-control" name="ukuran" id="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
