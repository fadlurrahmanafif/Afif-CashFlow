<?php

namespace App\Exports;

use App\Models\Pengeluaran;
use Maatwebsite\Excel\Concerns\FromCollection;

class PengeluaranExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pengeluaran::all(); // Mengambil semua data dari tabel pemasukan
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
