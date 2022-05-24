@extends('admin.app')
@section('judul', 'Order')
@section('content')
    <div class="card">

        <div class="card-body">
            <h4>Filter Berdasarkan</h4>
            <div class="row">
                <div class="col-md-3">
                    <form action="/admin/filter_kategori" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Kategori</label><br>
                            <select name="filter" class="form-control" id="kategori">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $kt)
                                    <option value="{{ $kt->id_kategori }}">{{ $kt->kategori }}</option>
                                @endforeach
                            </select>

                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Tampilkan</button>
                        <a href="/admin/laporan" class="btn btn-sm btn-secondary">Reset Filter</a>
                    </form>

                </div>
                <div class="col-md-9">

                    <form method="get" action="/admin/filter_tanggal">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tanggal</label><br>
                                    <select name="filter" id="filter" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="1">Per Tanggal</option>
                                        <option value="2">Per Bulan</option>
                                        <option value="3">Per Tahun</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div id="form-tanggal" class="form-group">
                                    <label>Tanggal</label>
                                    <input type="text" name="tanggal" class="input-tanggal form-control" />
                                </div>
                                <div id="form-bulan" class="form-group">
                                    <label>Bulan</label>
                                    <select name="bulan" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div id="form-tahun" class="form-group">
                                    <label>Tahun</label><br>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>

                                    </select>
                                </div>
                            </div>

                        </div>




                        <button type="submit" class="btn btn-sm btn-primary">Tampilkan</button>
                        <a href="/admin/laporan" class="btn btn-sm btn-secondary">Reset Filter</a>
                    </form>
                </div>
            </div>
            <br>

            <div class="table-responsive">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <th>#</th>
                        <th>Tanggal Order</th>
                        <th>Produk</th>
                        <th>Total Bayar</th>
                        <th>Metode Bayar</th>
                        <th>Statu Bayar</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody id="">
                        {{-- <tr id="order"></tr> --}}
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($order as $or)
                            @php
                                $id_order = $or->id_order;
                                $produk = App\Models\OrderDetail::where('tb_detail_order.id_order', $id_order)
                                    ->leftjoin('tb_produk', 'tb_produk.id_produk', '=', 'tb_detail_order.id_produk')
                                    ->get();
                                // dump($produk);
                            @endphp
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ date('d F Y', strtotime($or->created_at)) }}</td>
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
                                <td>{{ number_format($or->total_bayar, 0, ',', '.') }}</td>
                                <td>{{ $or->metode_bayar }}</td>
                                <td>
                                    @if ($or->status_bayar == 0)
                                        <p>Belum Bayar</p>
                                    @elseif ($or->status_bayar == 1)
                                        <a href="#validasi{{ $or->id_order }}" data-toggle="modal"
                                            class="btn btn-sm btn-warning">Validasi</a>
                                    @else
                                        <a href="#lunas{{ $or->id_order }}" data-toggle="modal"
                                            class="btn btn-sm btn-success">Lunas</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="/admin/faktur/{{ $or->id_order }}" class="btn btn-sm btn-primary">Faktur</a>
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
                        <h5 class="modal-title" id="exampleModalLabel">Validsasi Order</h5>
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
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a href="/admin/terima_bukti/{{ $od->id_order }}" class="btn btn-sm btn-primary">Validasi</a>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($order as $od)
        <div class="modal fade" id="lunas{{ $od->id_order }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
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
                                    style="width:500px;">
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

    {{-- <script>
        $(document).ready(function() {
            $('#kategori').on('change', function() {
                $("tbody").html("")

                var id = $(this).val();
                console.log(id);
                $.ajax({
                    url: '/admin/filter_kategori/' + id,
                    type: "GET",
                    // data: {
                    //     "_token": "{{ csrf_token() }}"
                    // },
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        // $('#order').html(data);
                        var a = 1;

                        // $('#order').html()
                        data.forEach(function(nilai, value) {
                            $('tbody').append(
                                `<tr>
                                <td>` + a + `</td>
                                <td>` + nilai.created_at + `</td>
                                <td>` + nilai.total_bayar + `</td>
                            <td>{{ `+nilai.ongkir+` }}</td>
                            </tr>`

                            );
                        });

                    }
                });
            });
        });
    </script> --}}




@endsection
