<?php

namespace App\Http\Controllers\Admin;

use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminOngkir extends Controller
{
    public function index()
    {
        $data['ongkir'] = DB::table('tb_ongkir')
            ->select('tb_ongkir.*', 'wilayah_provinsi.nama as provinsi', 'wilayah_kabupaten.nama as kabupaten', 'wilayah_kecamatan.nama as kecamatan')
            ->leftjoin('wilayah_provinsi', 'wilayah_provinsi.id', '=', 'tb_ongkir.id_provinsi')
            ->leftjoin('wilayah_kabupaten', 'wilayah_kabupaten.id', '=', 'tb_ongkir.id_kabupaten')
            ->leftjoin('wilayah_kecamatan', 'wilayah_kecamatan.id', '=', 'tb_ongkir.id_kecamatan')
            ->get();
        $data['provinsi'] = Provinsi::get();
        return view('admin.ongkir', $data);
    }
    public function add_ongkir(Request $request)
    {
        $kecamatan = $request->kecamatan;
        $kabupaten = $request->kabupaten;
        $provinsi = $request->provinsi;


        $ongkir = $request->ongkir;
        DB::table('tb_ongkir')->insert([
            'id_provinsi' => $provinsi,
            'id_kabupaten' => $kabupaten,
            'id_kecamatan' => $kecamatan,
            'ongkir' => $ongkir
        ]);
        return redirect()->back();
    }
    public function hapus_ongkir($id)
    {
        DB::table('tb_ongkir')->where('id_ongkir', $id)->delete();
        return redirect()->back();
    }
}
