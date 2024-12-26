<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datapenghuni extends Model
{
    use HasFactory;

    protected $table = 'datapenghuni';

    protected $fillable = [
        'user_id',
        'datakamar_id',
        'tanggal_masuk',
        'tanggal_keluar',
        'foto_ktp',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function datakamar()
    {
        return $this->belongsTo(DataKamar::class);
    }

    
}
