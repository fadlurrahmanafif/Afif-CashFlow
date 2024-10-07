<?php

namespace App\Exports;

use App\Models\Pemasukan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PemasukanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pemasukan::all(); // Mengambil semua data dari tabel pemasukan
    }

    public function headings(): array
    {
        return [
            'id',
            'tanggal',
            'keterangan',
            'nominal',
            'tipe',
            'created_at',
            'updated_at',
            // Tambahkan kolom lain sesuai kebutuhan
        ];
    }
}
