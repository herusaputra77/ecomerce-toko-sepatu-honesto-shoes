<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;
// use App\Models\Keranjang;

class CartController extends Controller
{
    public function cart()
    {
        $id_user = Session::get('id');
        $data['cart'] = Keranjang::where('tb_keranjang.id_user', $id_user)
            ->select('tb_produk.*', 'tb_keranjang.*', DB::raw('count(*) as jumlah_order'))
            ->leftjoin('tb_produk', 'tb_produk.id_produk', '=', 'tb_keranjang.id_produk')
            ->groupBy('tb_produk.id_produk')
            ->get();
        // dump($data['cart']);
        return view('cart', $data);
    }
    public function jumlah_order(Request $request)
    {
        $jml_order = $request->jumlah_order;

        $id_user = $request->id_user;
        $id_produk = $request->id_produk;

        dd($id_produk);

        Keranjang::where('tb_keranjang.id_user', $id_user)
            ->where('tb_keranjang.id_produk', $id_produk)->update([
                'jumlah' => $jml_order,
            ]);
        return redirect()->back();
    }
    // public function update_cart($cat_id, $qty)
    // {
    //     $cart = Keranjang::find(Input::get('cat_id'));
    //     $product = Produk::find($cart->product_id);
    //     $cart->no_of_items = Input::get('qty');
    //     $cart->price = $product->price * $cart->no_of_items;
    //     $cart->save();
    // }
}
