<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function cek_login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $akun = User::where('users.email', '=', $email)->leftjoin('role', 'role.id_role', '=', 'users.role_id')->first();
        // dd($password);
        if ($akun != null) {

            if ($akun->role_id == 1) {
                //  if ($akun->email == $email and Hash::check($password, $akun->password)) {
                if ($akun->email == $email and $akun->password == md5($password)) {
                    $request->session()->regenerate();
                    Session::put('email', $akun->username);
                    Session::put('id', $akun->id);

                    Session::put('name', $akun->name);
                    // Auth::guard('kalab')->LoginUsingId($akun->id);
                    return redirect('admin/beranda')->with('sukses', 'Anda Berhasil Login');
                } else {
                    return redirect('login_user')->with('error', 'Password Salah!');
                }
            } else if ($akun->role_id == 2) {
                // if ($akun->email == $email and Hash::check($password, $akun->password) == $password) {
                if ($akun->email == $email and $akun->password == md5($password)) {


                    // dd($akun->email);
                    $request->session()->regenerate();
                    Session::put('email', $akun->username);
                    Session::put('id', $akun->id);
                    Session::put('name', $akun->name);
                    // Auth::guard('kalab')->LoginUsingId($akun->id);
                    return redirect('/')->with('sukses', 'Anda Berhasil Login');
                } else {
                    return redirect('login_user')->with('error', 'Password Salah!');
                }
            }
        } else {

            return redirect('login_user')->with('error', 'Akun Belum Terdaftar');
        }
    }
    public function register()
    {
        $data['provinsi'] = Provinsi::get();

        return view('auth.register', $data);
    }
    public function add_register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8|required_with:password2|same:password2',
        ]);

        $nama = $request->nama;
        $email = $request->email;
        $password = $request->password;
        $role_id = 2;

        User::insert([
            'role_id' => $role_id,
            'name' => $nama,
            'email' => $email,
            // 'password' =>  Hash::make($password),
            'password' =>  md5($password),

            'foto' => 'user.png'
        ]);
        $id_user = DB::getPdo()->lastInsertId();

        $provinsi = $request->provinsi;
        $kabupaten = $request->kabupaten;
        $kecamatan = $request->kecamatan;
        $alamat = $request->alamat;
        $no_hp  = $request->no_hp;
        // $id_user = Session::get('id');
        DB::table('alamat_kirim')->where('id_user', $id_user)->insert([
            'id_user' => $id_user,
            'id_provinsi' => $provinsi,
            'id_kabupaten' => $kabupaten,
            'id_kecamatan' => $kecamatan,
            'alamat' => $alamat,
            'no_hp' => $no_hp
        ]);
        return redirect('login_user');
    }
    public function logout()
    {
        Session::flush();
        return redirect('/login_user')->with('pesan', 'Anda Berhasil Logout!');
    }
}
