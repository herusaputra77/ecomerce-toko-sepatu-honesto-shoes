@extends('admin.app')
@section('judul', 'Produk')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="#tambah" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah
                Produk</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($produk as $pro)

                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $pro->nm_produk }}</td>
                                <td>{{ $pro->nm_produk }}</td>
                                <td>{{ $pro->harga }}</td>
                                <td><img src="{{ asset('gambar/produk/' . $pro->gambar_produk) }}" width="100px"></td>
                                <td>{{ $pro->stok }}</td>
                                <td>
                                    <a href="#hapus_produk{{ $pro->id_produk }}" data-toggle="modal"
                                        class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
                                    </a>
                                    <a href="#edit_produk{{ $pro->id_produk }}" data-toggle="modal"
                                        class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="/admin/detail/{{ $pro->id_produk }}" class="btn btn-sm btn-warning"><i
                                            class="fa fa-sticky-note"></i></a>
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
                    <form action="/admin/add-produk" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Produk</label>
                            <input type="text" class="form-control" value="" name="nm_produk" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Kategori</label>
                            <select name="kategori" id="" class="form-control">
                                <option value="">
                                    <--Pilih Kategori-->
                                </option>
                                @foreach ($kategori as $ka)
                                    <option value="{{ $ka->id_kategori }}">
                                        {{ $ka->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="text" class="form-control" name="harga" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Stok</label>
                            <input type="text" class="form-control" name="stok" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Gambar Produk</label>
                            <input type="file" class="form-control" name="gambar" id="">
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($produk as $pr)
        <div class="modal fade" id="edit_produk{{ $pr->id_produk }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/edit-produk" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" class="form-control" value="{{ $pr->nm_produk }}" name="nm_produk"
                                    id="">
                                <input type="hidden" value="{{ $pr->id_produk }}" name="id_produk" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="kategori" id="" class="form-control">
                                    {{-- <option value="">
                                        <--Pilih Kategori-->
                                    </option> --}}
                                    @foreach ($kategori as $ka)
                                        <option value="{{ $ka->id_kategori }}"
                                            {{ $ka->id_kategori == $pr->id_kategori ? 'selected' : '' }}>
                                            {{ $ka->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="text" class="form-control" value="{{ $pr->harga }}" name="harga" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="number" class="form-control" min="1" value="{{ $pr->stok }}" name="stok"
                                    id="">
                            </div>
                            <div class="form-group">
                                <label for="">Gambar Produk</label>
                                <input type="file" class="form-control" name="gambar" id="">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($produk as $pro)

        <div class="modal fade" id="hapus_produk{{ $pro->id_produk }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p>Apakah anda yakin untuk menghapus produk {{ $pro->nm_produk }}?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a href="/admin/hapus_produk/{{ $pro->id_produk }}" class="btn btn-sm btn-primary"
                            type="submit">Simpan</a>

                    </div>
                </div>
            </div>
        </div>
    @endforeach




@endsection
