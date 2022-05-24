<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $id_user = Session::get('id');
        // $alamat_kirim = DB::table('alamat_kirim')->where('id_user',$id_user)->first();
        $data['alamat'] = DB::table('alamat_kirim')
            ->select('users.*', 'alamat_kirim.*', 'wilayah_provinsi.nama as provinsi', 'wilayah_kabupaten.nama as kabupaten', 'wilayah_kecamatan.nama as kecamatan')
            ->where('id_user', $id_user)
            ->leftjoin('users', 'users.id', '=', 'alamat_kirim.id_user')
            ->leftjoin('wilayah_provinsi', 'wilayah_provinsi.id', '=', 'alamat_kirim.id_provinsi')
            ->leftjoin('wilayah_kabupaten', 'wilayah_kabupaten.id', '=', 'alamat_kirim.id_kabupaten')
            ->leftjoin('wilayah_kecamatan', 'wilayah_kecamatan.id', '=', 'alamat_kirim.id_kecamatan')

            ->first();
        $data['cart'] = Keranjang::where('tb_keranjang.id_user', $id_user)
            ->select('tb_produk.*', 'tb_keranjang.*', DB::raw('count(*) as jumlah_order'))
            ->leftjoin('tb_produk', 'tb_produk.id_produk', '=', 'tb_keranjang.id_produk')
            ->groupBy('tb_produk.id_produk')
            ->get();
        return view('checkout', $data);
    }
}
