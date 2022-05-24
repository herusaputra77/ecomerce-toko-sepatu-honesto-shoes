<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengiriman;

class AdminOrder extends Controller
{
    public function index()
    {
        $data['order'] = Order::get();
        return view('admin.order', $data);
    }
    public function validasi_pembayaran($id)
    {
        $order = Order::where('id_order', $id)->first();
        Order::where('id_order', $id)->update([
            'status_bayar' => 2
        ]);
        // pengiriman
        if ($order->metode_bayar == 'COD') {

            Pengiriman::where('id_order', $id)->insert([
                'id_order' => $id,
                'status_kirim' => 'Terkirim'
            ]);
        } else {
            Pengiriman::where('id_order', $id)->insert([
                'id_order' => $id,
                'status_kirim' => 'Proses'
            ]);
        }
        return redirect()->back();
    }
    public function detail_order($id)
    {

        $data['order'] = Order::select('*')
            ->leftjoin('tb_detail_order', 'tb_detail_order.id_order', '=', 'tb_order.id_order')
            ->leftjoin('tb_produk', 'tb_produk.id_produk', '=', 'tb_detail_order.id_produk')

            ->where('tb_order.id_order', $id)
            ->get();
        dump($data['order']);
        return view('admin.detail_order', $data);
    }
}
