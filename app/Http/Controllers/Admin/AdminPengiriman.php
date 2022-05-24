<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPengiriman extends Controller
{
    public function index()
    {
        $data['order'] = Order::get();

        return view('admin/pengiriman', $data);
    }
}
