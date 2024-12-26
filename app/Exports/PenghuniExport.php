<?php

namespace App\Exports;

use App\Models\Datapenghuni;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenghuniExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Datapenghuni::all();
    }

    public function headings(): array
    {
        return [
            'user_id',
            'datakamar_id',
            'tanggal_masuk',
            'tanggal_keluar',
            'foto_ktp',
            'status',
        ];
    }
}
