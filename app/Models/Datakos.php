<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datakos extends Model
{
    protected $table = 'datakos';

    protected $fillable = [
        'nama_kost',
        'pemilik',
        'alamat',
        'jumlah_kamar',
        'rating'
    ];
}

?>
