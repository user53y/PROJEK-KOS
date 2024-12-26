<?php

namespace App\Exports;

use App\Models\Datakamar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KamarExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Datakamar::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'No Kamar',
            'Tipe',
            'Luas',
            'Lantai',
            'Kapasitas',
            'Harga Bulanan',
            'Status',
            'Created At',
            'Updated At',
        ];
    }
}
