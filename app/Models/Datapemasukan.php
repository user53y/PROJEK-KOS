<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datapemasukan extends Model
{
    use HasFactory;

    protected $table = 'datapemasukan';
    protected $fillable = [
        'penghuni_id',
        'jumlah',
        'tanggal',
    ]; 


    public function penghuni()
    {
        return $this->belongsTo(Datapenghuni::class, 'penghuni_id');
    }


    public function kamar()
    {
        return $this->belongsTo(Datakamar::class, 'kamar_id');
    }
}
