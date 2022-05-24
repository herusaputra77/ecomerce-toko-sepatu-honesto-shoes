<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Laravel\Ui\Presets\React;

class AdminLaporan extends Controller
{
    public function index()
    {
        $data['order'] = Order::get();
        $data['kategori'] = DB::table('tb_kategori')->get();

        return view('admin/laporan', $data);
    }
    public function faktur($id)
    {
        $data['faktur'] = Order::where('tb_order.id_order', $id)
            ->leftjoin('tb_detail_order', 'tb_detail_order.id_order', '=', 'tb_order.id_order')
            ->leftjoin('tb_produk', 'tb_produk.id_produk', '=', 'tb_detail_order.id_produk')
            ->get();
        $data['pembeli'] = Order::where('tb_order.id_order', $id)
            ->select('users.*', 'alamat_kirim.*', 'wilayah_provinsi.nama as nama_provinsi', 'wilayah_kabupaten.nama as nama_kabupaten', 'wilayah_kecamatan.nama as nama_kecamatan')
            ->leftjoin('users', 'users.id', '=', 'tb_order.id_user')
            ->leftjoin('alamat_kirim', 'alamat_kirim.id_user', '=', 'users.id')
            ->leftjoin('wilayah_provinsi', 'alamat_kirim.id_provinsi', '=', 'wilayah_provinsi.id')
            ->leftjoin('wilayah_kabupaten', 'alamat_kirim.id_kabupaten', '=', 'wilayah_kabupaten.id')
            ->leftjoin('wilayah_kecamatan', 'alamat_kirim.id_kecamatan', '=', 'wilayah_kecamatan.id')
            ->first();
        $data['order'] = Order::where('id_order', $id)->get();
        $data['orderr'] = Order::where('id_order', $id)->first();

        return view('admin/faktur', $data);
    }
    public function filter_kategori(Request $request)
    {
        $kategori = $request->filter;
        $order = Order::where('tb_kategori.id_kategori', $kategori)
            ->select('tb_order.*')
            ->leftjoin('tb_detail_order', 'tb_detail_order.id_order', '=', 'tb_order.id_order')
            ->leftjoin('tb_produk', 'tb_produk.id_produk', '=', 'tb_detail_order.id_produk')
            ->leftjoin('tb_kategori', 'tb_kategori.id_kategori', '=', 'tb_produk.kategori_id')
            ->get();
        // $no = 1;
        // foreach ($order as $or) {
        //     $data =
        //         '<td>' . $no++ . '</td>' .
        //         `<td>` . $or->created_at . `</td>` .
        //         `<td>` . $or->created_at . `</td>` .
        //         `<td>` . $or->created_at . `</td>` .
        //         `<td>` . $or->created_at . `</td>`;
        // }


        // dd($data['faktur']);
        // return json_encode($order);
        $data['kategori'] = DB::table('tb_kategori')->get();

        $data['order'] = $order;
        return view('admin.laporan', $data);
    }
    public function filter_tanggal(Request $request)
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data order Tanggal ' . date('d-m-y', strtotime($tgl));
                // $url_cetak = 'order/cetak?filter=1&tanggal=' . $tgl;
                $order = Order::where(DB::raw(('date(created_at)')), $tgl)->get(); // Panggil fungsi view_by_date yang ada di m_penjual
                // dd($order);
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data order Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                // $url_cetak = 'order/cetak?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                // $order = $this->m_penjual->view_by_month($bulan, $tahun);
                $order = Order::where(DB::raw(('month(created_at)')), $bulan)
                    ->where(DB::raw(('year(created_at)')), $tahun)
                    ->get();
                // dd($order);


                // Panggil fungsi view_by_month yang ada di m_penjual
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data order Tahun ' . $tahun;
                // $url_cetak = 'order/cetak?filter=3&tahun=' . $tahun;
                // $order = $this->m_penjual->view_by_year($tahun);
                $order = Order::where(DB::raw(('year(created_at)')), $tahun)->get();
                // dd($order);

                // Panggil fungsi view_by_year yang ada di m_penjual
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data order';
            $url_cetak = 'order/cetak';
            $order = $this->M_penjual->view_all(); // Panggil fungsi view_all yang ada di m_penjual
        }
        $data['ket'] = $ket;
        // $data['url_cetak'] = base_url('index.php/' . $url_cetak);
        $data['order'] = $order;
        $data['kategori'] = DB::table('tb_kategori')->get();

        return view('admin/laporan', $data);
    }
    public function cetak($id)
    {
        $data['faktur'] = Order::where('tb_order.id_order', $id)
            ->leftjoin('tb_detail_order', 'tb_detail_order.id_order', '=', 'tb_order.id_order')
            ->leftjoin('tb_produk', 'tb_produk.id_produk', '=', 'tb_detail_order.id_produk')
            ->get();
        $data['pembeli'] = Order::where('tb_order.id_order', $id)
            ->select('users.*', 'alamat_kirim.*', 'wilayah_provinsi.nama as nama_provinsi', 'wilayah_kabupaten.nama as nama_kabupaten', 'wilayah_kecamatan.nama as nama_kecamatan')
            ->leftjoin('users', 'users.id', '=', 'tb_order.id_user')
            ->leftjoin('alamat_kirim', 'alamat_kirim.id_user', '=', 'users.id')
            ->leftjoin('wilayah_provinsi', 'alamat_kirim.id_provinsi', '=', 'wilayah_provinsi.id')
            ->leftjoin('wilayah_kabupaten', 'alamat_kirim.id_kabupaten', '=', 'wilayah_kabupaten.id')
            ->leftjoin('wilayah_kecamatan', 'alamat_kirim.id_kecamatan', '=', 'wilayah_kecamatan.id')
            ->first();
        $data['order'] = Order::where('id_order', $id)->get();
        $data['orderr'] = Order::where('id_order', $id)->first();

        return view('admin/cetak', $data);
    }
}
