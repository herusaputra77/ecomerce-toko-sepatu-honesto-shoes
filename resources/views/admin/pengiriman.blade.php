@extends('admin.app')
@section('judul', 'Order')
@section('content')
    <div class="card">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <th>#</th>
                        <th>Tanggal Order</th>
                        <th>Total Bayar</th>
                        <th>Metode Bayar</th>
                        <th>Statu Pengiriman</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($order as $or)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ date('d F Y', strtotime($or->created_at)) }}</td>
                                <td>{{ number_format($or->total_bayar, 0, ',', '.') }}</td>
                                <td>{{ $or->metode_bayar }}</td>
                                <td>
                                    <a href="#detail{{ $or->id_order }}" data-toggle="modal"
                                        class="btn btn-sm btn-warning">Detail Kirim</a>
                                    {{-- @if ($or->status_bayar == 0)
                                        <p>Belum Bayar</p>
                                    @elseif ($or->status_bayar == 1)
                                        <a href="#validasi{{ $or->id_order }}" data-toggle="modal"
                                            class="btn btn-sm btn-warning">Validasi</a>
                                    @else
                                        <a href="#lunas{{ $or->id_order }}" data-toggle="modal"
                                            class="btn btn-sm btn-success">Lunas</a>
                                    @endif --}}
                                </td>
                                <td>
                                    <a href="/admin/detail-order/{{ $or->id_order }}" class="btn btn-sm btn-primary"><i
                                            class="fa fa-book"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach ($order as $od)
        <div class="modal fade" id="detail{{ $od->id_order }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Validsasi Order</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="">

                            <table class="table table-striped">
                                <thead>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                </thead>
                                <tbody>
                                    @php
                                        $id = $od->id_order;
                                        $pengiriman = App\Models\Pengiriman::where('tb_order.id_order', $id)
                                            ->leftjoin('tb_order', 'tb_order.id_order', '=', 'tb_pengiriman.id_order')
                                            ->get();
                                    @endphp
                                    @foreach ($pengiriman as $pe)
                                        @if ($pe->status_kirim == null)
                                            <tr>
                                                <td>{{ date('G:i d/m/Y', strtotime($pe->created_at)) }}</td>

                                                <td>Menunggu Proses Pembayaran</td>
                                            </tr>
                                        @elseif ($pe->status_kirim == 'Proses')
                                            <tr>
                                                <td>{{ date('G:i d/m/Y', strtotime($pe->created_at)) }}</td>

                                                <td>Proses Pengiriman</td>
                                            </tr>
                                        @elseif ($pe->status_kirim == 'Terkirim')
                                            <tr>
                                                <td>{{ date('G:i d/m/Y', strtotime($pe->created_at)) }}</td>

                                                <td>Terkirim</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>{{ date('G:i d/m/Y', strtotime($pe->created_at)) }}</td>

                                                <td>Pengiriman Gagal</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a href="/admin/terima_bukti/{{ $od->id_order }}" class="btn btn-sm btn-primary">Validasi</a>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($order as $od)
        <div class="modal fade" id="lunas{{ $od->id_order }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran Produk</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="">

                            <center><img src="{{ asset('gambar/bukti_bayar/' . $od->bukti_bayar) }}"
                                    style="width:250px;">
                            </center>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a href="/admin/terima_bukti/{{ $od->id_order }}" class="btn btn-sm btn-primary">Validasi</a>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach




@endsection
