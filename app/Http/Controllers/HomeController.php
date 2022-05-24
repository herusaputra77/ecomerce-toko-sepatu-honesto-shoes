<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Models\DetailKeranjang;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id_user = Session::get('id');

        $data['produk'] = Produk::where('tb_produk.stok', '>', 0)->get();
        $data['kategori'] = Kategori::get();
        // $data['ukuran'] = DB::table('tb_ukuran_produk')->where('produk_id', $id)
        //     ->orderBy('ukuran', 'asc')
        //     ->get();
        // $data['keranjang2'] = Keranjang::where('tb_keranjang.id_user', $id_user)
        //     ->leftjoin('tb_produk', 'tb_produk.id_produk', '=', 'tb_keranjang.id_produk')
        //     ->get();
        // dd($data['keranjang']);
        return view('beranda', $data);
    }
    public function add_cart(Request $request)
    {

        $id_user = Session::get('id');
        $id_produk = $request->id_produk;
        $jumlah = $request->jumlah;
        if ($request->ukuran == null) {
            $ukuran = 'All Size';
        } else {
            $ukuran = $request->ukuran;
        }

        $keranjang = Keranjang::where('id_user', $id_user)->get();


        Keranjang::insert([
            'id_user' => $id_user,
            'id_produk' => $id_produk,
            'jumlah' => $jumlah
        ]);
        $id_keranjang = DB::getPdo()->lastInsertId();

        DetailKeranjang::insert([
            'keranjang_id' => $id_keranjang,
            'ukuran' => $ukuran
        ]);
        $produk = Produk::where('id_produk', $id_produk)->first();
        $stok = $produk->stok;
        $new_stok = $stok - $jumlah;

        Produk::where('id_produk', $id_produk)->update([
            'stok' => $new_stok
        ]);
        return redirect('/');
        // }
        //     }
        // }
    }
    public function delete_cart($id)
    {
        Keranjang::where('id_keranjang', $id)->delete();
        return redirect()->back();
    }
    public function katagori($id)
    {
        $data['produk'] = Produk::where('kategori_id', $id)->get();
        $data['kategori'] = Kategori::get();
        // dump($data['produk']);
        return view('beranda', $data);
    }
    public function search_produk(Request $request)
    {
        $text = $request->text;
        $data['produk'] = Produk::where('nm_produk', 'like', "%" . $text . "%")->get();
        $data['kategori'] = Kategori::get();
        return view('beranda', $data);
    }
}
