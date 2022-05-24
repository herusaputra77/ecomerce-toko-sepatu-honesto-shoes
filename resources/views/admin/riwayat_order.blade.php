@extends('admin.app')
@section('judul', 'Riwayat Order')
@section('content')
    <div class="card">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <th>#</th>
                        <th>Tanggal Order</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Gambar Produk</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($order as $or)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ date('d F Y', strtotime($or->created_at)) }}</td>
                                <td>{{ $or->nm_produk }}</td>
                                <td>{{ $or->jumlah_order }}</td>
                                <td>
                                    {{ $or->harga }}
                                </td>
                                <td>
                                    <img src="{{ asset('gambar/produk/' . $or->gambar_produk) }}" width="50px" alt="">
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach ($order as $od)

        <div class="modal fade" id="validasi{{ $od->id_order }}" tabindex="-1" role="dialog"
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
                        <div class="">

                            <center><img src="{{ asset('gambar/bukti_bayar/' . $od->bukti_bayar) }}" style="width:250px;">
                            </center>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a href="/admin/terima_bukti/{{ $od->id_order }}" class="btn btn-sm btn-primary">Validasi</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach




@endsection
