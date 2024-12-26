<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Datakamar extends Model
{
    protected $fillable = [
        'no_kamar',
        'tipe',
        'luas',
        'lantai',
        'kapasitas',
        'harga_bulanan',
        'status',
        'gambar'
    ];

    protected $table = 'datakamar';

    protected $primaryKey = 'id';

    public function datapenghuni()
    {
        return $this->hasMany(DataPenghuni::class, 'datakamar_id');
    }

}
