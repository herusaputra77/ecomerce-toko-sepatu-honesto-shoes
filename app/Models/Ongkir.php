<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ongkir extends Model
{
    use HasFactory;
    protected $table = 'tb_ongkir';
    protected $fillable = [
        'ongkir', 'id_kecamatan', 'id_provinsi', 'id_kabupaten'
    ];
}
