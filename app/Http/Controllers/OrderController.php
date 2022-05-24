<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Keranjang;
use App\Models\OrderDetail;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function index()
    {
        $id_user = Session::get('id');
        $data['order'] = Order::where('tb_order.id_user', $id_user)
            // ->where('status_bayar', '!=', 1)
            // ->leftjoin('tb_detail_order', 'tb_detail_order.id_order', '=', 'tb_order.id_order')
            ->get();
        // dump($data['order']);
        return view('orderan', $data);
    }
    public function order(Request $request)
    {
        $metode_bayar = $request->metode_bayar;
        $ongkir = $request->ongkir;
        $total_bayar = $request->total_bayar;
        echo $ongkir;
        echo $total_bayar;
        echo $metode_bayar;
        // echo date();


        $id_user = Session::get('id');
        $keranjang = Keranjang::where('id_user', $id_user)
            ->leftjoin('tb_produk', 'tb_produk.id_produk', '=', 'tb_keranjang.id_produk')
            ->leftjoin('detail_keranjang', 'detail_keranjang.keranjang_id', '=', 'tb_keranjang.id_keranjang')

            ->get();
        // dd($keranjang);
        $total_order = 0;
        // echo 'adaa';
        foreach ($keranjang as $k) {
            $id_produk = $k->id_produk;
            $jumlah = $k->jumlah;
            $harga = $k->harga;
            $id_produk = $k->id_produk;
            $total_order += $harga * $jumlah;
        }
        echo $total_order;
        Order::insert([
            'id_user' => $id_user,
            'tgl_order' => time(),
            'metode_bayar' => $metode_bayar,
            'total_order' => $total_order,
            'ongkir' => $ongkir,
            'total_bayar' => $total_bayar,
            'status_bayar' => 0,
            'bukti_bayar' => ''

        ]);
        $id_order = DB::getPdo()->lastInsertId();
        foreach ($keranjang as $ke) {

            OrderDetail::insert([
                'id_order' => $id_order,
                'id_produk' => $ke->id_produk,
                'harga_order' => $ke->harga,
                'jumlah_order' => $ke->jumlah,
                'ukuran_order' => $ke->ukuran
            ]);
            DB::table('detail_keranjang')->where('keranjang_id', $ke->id_keranjang)->delete();
        }
        Keranjang::where('id_user', $id_user)->delete();
        // pengiriman
        if ($metode_bayar == 'COD') {
            Pengiriman::insert([
                'id_order' => $id_order,
                'status_kirim' => 'Proses'
            ]);
        } else {

            Pengiriman::insert([
                'id_order' => $id_order
            ]);
        }

        return redirect('order');
    }
    public function detail_order($id)
    {
        $id_user = Session::get('id');
        $data['detail_order'] = OrderDetail::where('tb_order.id_user', $id_user)
            ->where('tb_order.id_order', $id)
            ->leftjoin('tb_produk', 'tb_produk.id_produk', 'tb_detail_order.id_produk')
            ->leftjoin('tb_order', 'tb_order.id_order', 'tb_detail_order.id_order')
            ->get();

        $data['pengiriman'] = Pengiriman::where('tb_order.id_user', $id_user)
            ->where('tb_order.id_order', $id)
            ->leftjoin('tb_order', 'tb_order.id_order', '=', 'tb_pengiriman.id_order')
            ->get();
        // dump($data['pengiriman']);
        return view('detail_order', $data);
    }
    public function pembayaran($id)
    {
        $id_user = Session::get('id');
        $data['order'] = Order::where('id_user', $id_user)
            ->where('id_order', $id)
            ->first();
        return view('pembayaran', $data);
    }
    public function pembayaran_cod($id)
    {
        $id_user = Session::get('id');
        $data['order'] = Order::where('id_user', $id_user)
            ->where('id_order', $id)
            ->first();
        return view('pembayaran_cod', $data);
    }
    public function terima_order($id)
    {
        $id_user = Session::get('id');
        $data['order'] = Order::where('id_user', $id_user)
            ->where('id_order', $id)
            ->first();
        return view('terima_order', $data);
    }
    public function update_pembayaran(Request $request)
    {
        $id_order = $request->id_order;
        $gambar = $request->bukti_bayar;
        $filename = $gambar->getClientOriginalName();
        $upload = $filename;
        $gambar->move(public_path('gambar/bukti_bayar'), $upload);
        Order::where('id_order', $id_order)->update([
            'status_bayar' => 1,
            'bukti_bayar' => $filename
        ]);
        return redirect()->back();
    }
    public function update_pembayaran_cod(Request $request)
    {
        $id_order = $request->id_order;
        $gambar = $request->bukti_bayar;
        $filename = $gambar->getClientOriginalName();
        $upload = $filename;
        $gambar->move(public_path('gambar/bukti_terima'), $upload);
        Order::where('id_order', $id_order)->update([
            'status_bayar' => 1,
            'bukti_terima' => $filename
        ]);

        return redirect()->back();
    }
    public function update_terima_order(Request $request)
    {
        $id_order = $request->id_order;
        $gambar = $request->bukti_bayar;
        $filename = $gambar->getClientOriginalName();
        $upload = $filename;
        $gambar->move(public_path('gambar/bukti_terima'), $upload);
        Order::where('id_order', $id_order)->update([

            'bukti_terima' => $filename
        ]);
        Pengiriman::where('id_order', $id_order)->insert([
            'id_order' => $id_order,
            'status_kirim' => 'Terkirim'
        ]);


        return redirect()->back();
    }
}
