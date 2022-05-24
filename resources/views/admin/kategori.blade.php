@extends('admin.app')
@section('judul', 'Produk')
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
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($kategori as $ka)

                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $ka->kategori }}</td>
                                <td>{{ $ka->keterangan }}</td>
                                <td>
                                    <a href="#hapus{{ $ka->id_kategori }}" data-toggle="modal"
                                        class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="#edit{{ $ka->id_kategori }}" data-toggle="modal"
                                        class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/add-kategori" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Kategori</label>
                            <input type="text" class="form-control" name="kategori" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="">
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

    @foreach ($kategori as $k)

        <div class="modal fade" id="hapus{{ $k->id_kategori }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Produk</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin untuk menghapus kategori {{ $k->kategori }}?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a href="/admin/hapus-kategori/{{ $k->id_kategori }}" class="btn btn-sm btn-primary">Simpan</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($kategori as $k)

        <div class="modal fade" id="edit{{ $k->id_kategori }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Produk</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/edit-kategori" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Kategori</label>
                                <input type="hidden" class="form-control" value="{{ $k->id_kategori }}"
                                    name="id_kategori">
                                <input type="text" class="form-control" value="{{ $k->kategori }}" name="kategori"
                                    id="">
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <input type="text" class="form-control" value="{{ $k->keterangan }}" name="keterangan"
                                    id="">
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
    @endforeach

@endsection
