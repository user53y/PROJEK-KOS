<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datapengeluaran extends Model
{
    use HasFactory;

    protected $table = 'datapengeluaran';

    protected $fillable = [
        'jenis_id',
        'deskripsi_pengeluaran',
        'jumlah_pengeluaran',
        'tanggal_pengeluaran',
    ];

    public function jenisPengeluaran()
    {
        return $this->belongsTo(JenisPengeluaran::class, 'jenis_id');
    }
}
