<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUser extends Controller
{
    public function index()
    {
        $data['user'] = User::join('role', 'role.id_role', '=', 'users.role_id')->get();
        // dump($data['user']);
        return view('admin.user', $data);
    }
}
