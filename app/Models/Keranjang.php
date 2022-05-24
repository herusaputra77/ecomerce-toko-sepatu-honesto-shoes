<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'tb_keranjang';
    protected $fillable =
    ["id_user", "id_produk", "jumlah"];
}
