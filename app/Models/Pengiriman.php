<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;
    protected $table = 'tb_pengiriman';
    protected $fillable = [
        'id_order', 'jasa_kirim', 'status_kirim'
    ];
}
