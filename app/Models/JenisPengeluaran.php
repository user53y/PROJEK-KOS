<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPengeluaran extends Model
{
    use HasFactory;

    protected $table = 'jenispengeluaran';

    protected $fillable = [
        'kategori_pengeluaran',
        'nama_pengeluaran',
    ];

    public function dataPengeluaran()
    {
        return $this->hasMany(DataPengeluaran::class, 'jenis_id');
    }
}
