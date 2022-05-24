<?php

namespace App\Http\Controllers\admin;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminProduk extends Controller
{
    public function index()
    {
        $data['kategori'] = Kategori::get();
        $data['produk'] = Produk::get();
        return view('admin.produk', $data);
    }
    public function add_produk(Request $request)
    {
        $gambar = request()->gambar;
        $filename = $gambar->getClientOriginalName();
        $upload = $filename;
        $gambar->move(public_path('gambar/produk'), $upload);
        Produk::insert([
            'nm_produk' => $request->nm_produk,
            'kategori_id' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar_produk' => $upload
        ]);
        return redirect()->back();
    }
    public function kategori()
    {
        $data['kategori'] = Kategori::get();

        return view('admin.kategori', $data);
    }
    public function add_kategori(Request $request)
    {
        Kategori::insert([
            'kategori' => $request->kategori,
            'keterangan' => $request->keterangan

        ]);
        return redirect()->back();
    }
    public function hapus_produk($id)
    {
        Produk::where('id_produk', $id)->delete();
        return redirect()->back();
    }
    public function edit_produk(Request $request)
    {
        $id_produk = $request->id_produk;
        $gambar = request()->gambar;
        if ($gambar == "") {
        } else {

            $filename = $gambar->getClientOriginalName();
            $upload = $filename;
            $gambar->move(public_path('profile/produk'), $upload);
            Produk::where('id_produk', $id_produk)->update(['gambar_produk' => $filename]);
        }
        Produk::where('id_produk', $id_produk)->update([
            'nm_produk' => $request->nm_produk,
            'kategori_id' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);
        return redirect()->back();
    }
    public function detail_produk($id)
    {
        $data['produk'] = Produk::where('id_produk', $id)->first();
        $data['ukuran'] = DB::table('tb_ukuran_produk')->where('produk_id', $id)
            ->orderBy('ukuran', 'asc')
            ->get();
        return view('admin.detailProduk', $data);
    }
    public function add_detail_produk(Request $request)
    {
        $id_produk = $request->id_produk;
        DB::table('tb_ukuran_produk')->insert([
            'produk_id' => $id_produk,
            'ukuran' => $request->ukuran
        ]);
        return redirect()->back();
    }
    public function hapus_kategori($id)
    {
        DB::table('tb_kategori')->where('id_kategori', $id)->delete();
        return redirect()->back();
    }
    public function edit_kategori(Request $request)
    {
        $id_kategori = $request->id_kategori;
        $kategori = $request->kategori;
        $katerangan = $request->keterangan;

        DB::table('tb_kategori')->where('id_kategori', $id_kategori)->update([
            'kategori' => $kategori,
            'keterangan' => $katerangan
        ]);
        return redirect()->back();
    }
}
