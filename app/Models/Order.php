<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'tb_order';
    protected $fillable = [
        'tgl_order', 'id_user', 'metode_bayar', 'total_order', 'ongir', 'total_bayar', 'status_bayar', 'bukti_bayar'
    ];
}
