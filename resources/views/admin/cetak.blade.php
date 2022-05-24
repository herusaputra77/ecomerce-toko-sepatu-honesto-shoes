<style>
    .scroll {
        display: block;
        /* border: 1px solid red; */
        padding: 5px;
        margin-top: 5px;
        width: 1000px;
        height: 1000px;
        overflow: scroll;
    }

    .auto {
        display: block;
        border: 1px solid red;
        padding: 5px;
        margin-top: 5px;
        width: 300px;
        height: 50px;
        overflow: auto;
    }

</style>
<div class="card">
    <div class="card-body">
        <div class="">

            <center>
                <table class="table table-hover"
                    style='width:800px; font-size:12pt; font-family:calibri; border-collapse: collapse;' border='0'>
                    <tr>

                        <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                            {{-- <span style='font-size:12pt'><b>Nama Toko</b></span></br> --}}
                            <h3>Honesto Shoes</h3>
                            Alamat Toko : Jln. Gajah Mada No.10, Kec. Nanggalo, Kota Padang, Sumatera Barat</br>
                            Telp : 0594094545
                        </td>
                        <td style='vertical-align:top' width='30%' align='left'>
                            <b><span style='font-size:12pt'>FAKTUR PENJUALAN</span></b></br>
                            @foreach ($order as $or)
                                No Trans. : {{ $or->id_order }}</br>
                                Tanggal : {{ date('d F Y', strtotime($or->created_at)) }}</br>
                            @endforeach
                        </td>
                    </tr>

                    <td width='70%' align='left' style=''>
                        Nama Pemebeli : {{ $pembeli->name }}</br>
                        Alamat : {{ $pembeli->alamat }}, Kec. {{ $pembeli->nama_kecamatan }}, Kab.
                        {{ $pembeli->nama_kabupaten }}, {{ $pembeli->nama_provinsi }} <br>
                        No Telp : {{ $pembeli->no_hp }}
                    </td>
                    <td style='vertical-align:top' width='30%' align='left'>
                    </td>

                </table>
                <table class="table table-hover">
                    <thead>
                        <th>Nama Barang</th>
                        <th>Gambar Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </thead>
                    <tbody>
                        @php
                            $total_order = 0;
                            $ongkir = 0;

                        @endphp
                        @foreach ($faktur as $fa)
                            @php
                                $total_order += $fa->jumlah_order * $fa->harga_order;
                                $ongkir = $fa->ongkir;
                                $total_bayar = $fa->total_bayar;

                            @endphp
                            <tr>
                                <td>{{ $fa->nm_produk }}</td>
                                <td>
                                    <img src="{{ asset('gambar/produk/' . $fa->gambar_produk) }}" width="50" alt="">
                                </td>
                                <td>Rp. {{ number_format($fa->harga_order, 0, ',', '.') }}</td>
                                <td>{{ $fa->jumlah_order }}</td>
                                <td>Rp. {{ number_format($fa->jumlah_order * $fa->harga_order) }}</td>

                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4">Total Order</td>
                            <td>Rp. {{ number_format($total_order) }}</td>
                        </tr>
                        <tr>
                            <td colspan="4">Biaya Ongkir</td>
                            <td>Rp. {{ number_format($ongkir) }}</td>
                        </tr>
                        <tr>
                            <td colspan="4">Total Bayar</td>
                            <td>Rp. {{ number_format($total_bayar) }}</td>
                        </tr>

                    </tbody>

                </table>

                {{-- <table style='width:650; font-size:7pt;' cellspacing='2'>
                        <tr>
                            <td align='center'>Diterima Oleh,</br></br><u>(............)</u></td>
                            <td style='border:1px solid black; padding:5px; text-align:left; width:30%'></td>
                            <td align='center'>TTD,</br></br><u>(...........)</u></td>
                        </tr>
                    </table> --}}
            </center>
        </div>

        <div>
            <div style="width:300px;float:left">

                Padang, <?= date('d m Y') ?>

                <br />Pembeli<br>
                <p></p><br>
                <p>(------------------------)</p>

            </div>


            <div style="width:300px;float:right">

                Padang, <?= date('d m Y') ?>

                <br />Penjual<br>
                <p></p><br>
                <p>(------------------------)</p>

            </div>

            <div style="clear:both"></div>

        </div>

    </div>
</div>

<script>
    window.print();
</script>
