<?php

namespace App\Exports;

use App\Kelas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KelasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kelas::select('id_kelas','nama_kelas','kompetensi_keahlian')->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Kelas',
            'Kompetensi Keahlian',
        ];
    }
}
