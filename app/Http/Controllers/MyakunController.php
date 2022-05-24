<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Pengiriman;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Rules\CurrentPassword;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MyakunController extends Controller
{
    public function index()
    {
        $id_user = Session::get('id');
        $data['alamat'] = DB::table('alamat_kirim')
            ->select('users.*', 'alamat_kirim.*', 'wilayah_provinsi.nama as provinsi', 'wilayah_kabupaten.nama as kabupaten', 'wilayah_kecamatan.nama as kecamatan')
            ->where('id_user', $id_user)
            ->leftjoin('users', 'users.id', '=', 'alamat_kirim.id_user')
            ->leftjoin('wilayah_provinsi', 'wilayah_provinsi.id', '=', 'alamat_kirim.id_provinsi')
            ->leftjoin('wilayah_kabupaten', 'wilayah_kabupaten.id', '=', 'alamat_kirim.id_kabupaten')
            ->leftjoin('wilayah_kecamatan', 'wilayah_kecamatan.id', '=', 'alamat_kirim.id_kecamatan')

            ->first();
        $data['riwayat'] = Order::where('id_user', $id_user)
            ->where('status_bayar', 2)
            ->get();
        $data['provinsi'] = Provinsi::get();
        $data['user'] = User::where('id', $id_user)->first();
        // dump($data['alamat']);
        return view('my_akun', $data);
    }
    public function ajax_provinsi($id)
    {
        $id_provinsi = $id;

        $kabupaten = Kabupaten::where('provinsi_id', $id_provinsi)->get();
        var_dump($kabupaten);
        // echo json_encode($kabupaten);
        foreach ($kabupaten as $kb) {
            echo "<option value=" . $kb['id'] . ">" . $kb['nama'] . "</option>";
        }
    }
    public function ajax_kabupaten($id)
    {
        $id_kecamatan = $id;

        $kecamatan = Kecamatan::where('kabupaten_id', $id_kecamatan)->get();
        var_dump($kecamatan);
        // echo json_encode($kecamatan);
        foreach ($kecamatan as $kb) {
            echo "<option value=" . $kb['id'] . ">" . $kb['nama'] . "</option>";
        }
    }
    public function edit_alamat(Request $request)
    {
        $provinsi = $request->provinsi;
        $kabupaten = $request->kabupaten;
        $kecamatan = $request->kecamatan;
        $alamat = $request->alamat;
        $no_hp  = $request->no_hp;
        $id_user = Session::get('id');
        DB::table('alamat_kirim')->where('id_user', $id_user)->update([
            'id_provinsi' => $provinsi,
            'id_kabupaten' => $kabupaten,
            'id_kecamatan' => $kecamatan,
            'alamat' => $alamat,
            'no_hp' => $no_hp
        ]);
        return redirect()->back()->with('pesan', 'Alamat Sudah di Ubah');
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
        return view('riwayat_order', $data);
    }
    public function edit_profile(Request $request)
    {
        $id_user = Session::get('id');
        $foto = $request->foto;
        // $password_baru = md5($request->password_baru);
        // if ($password_baru == '') {
        // } else {
        //     User::where('id', $id_user)->update([
        //         'password' => $password_baru
        //     ]);
        // }
        if ($foto == "") {
        } else {

            $filename = $foto->getClientOriginalName();
            $upload = $filename;
            $foto->move(public_path('profile'), $upload);
            User::where('id', $id_user)->update(['foto' => $filename]);
        }
        User::where('id', $id_user)->update([
            'name' => $request->nama
        ]);
        return redirect()->back()->with('pesan', 'Data Sudah Diubah');
    }
    public function ganti_password(Request $request)
    {
        $request->validate([
            // 'password_lama' => ['required', new CurrentPassword],
            'password_baru' => 'required|min:8|required_with:konfirmasi_password|same:konfirmasi_password',
            'konfirmasi_password' => 'required|min:8',

        ]);
        $id_user = Session::get('id');

        $password_baru = md5($request->password_baru);
        User::where('id', $id_user)->update([
            'password' => $password_baru

        ]);


        return redirect()->back()->with('pesan', 'Berhasil Ganti Password');
    }
    public function faktur_order($id)
    {
        $id_user = Session::get('id');
        $data['faktur'] = Order::where('tb_order.id_order', $id)->where('tb_order.id_user', $id_user)
            ->leftjoin('tb_detail_order', 'tb_detail_order.id_order', '=', 'tb_order.id_order')
            ->leftjoin('tb_produk', 'tb_produk.id_produk', '=', 'tb_detail_order.id_produk')
            ->get();
        $data['pembeli'] = Order::where('tb_order.id_order', $id)->where('tb_order.id_user', $id_user)
            ->select('users.*', 'alamat_kirim.*', 'wilayah_provinsi.nama as nama_provinsi', 'wilayah_kabupaten.nama as nama_kabupaten', 'wilayah_kecamatan.nama as nama_kecamatan')
            ->leftjoin('users', 'users.id', '=', 'tb_order.id_user')
            ->leftjoin('alamat_kirim', 'alamat_kirim.id_user', '=', 'users.id')
            ->leftjoin('wilayah_provinsi', 'alamat_kirim.id_provinsi', '=', 'wilayah_provinsi.id')
            ->leftjoin('wilayah_kabupaten', 'alamat_kirim.id_kabupaten', '=', 'wilayah_kabupaten.id')
            ->leftjoin('wilayah_kecamatan', 'alamat_kirim.id_kecamatan', '=', 'wilayah_kecamatan.id')
            ->first();
        $data['order'] = Order::where('id_order', $id)->where('tb_order.id_user', $id_user)->get();
        $data['orderr'] = Order::where('id_order', $id)->first();

        return view('faktur', $data);
    }
}
