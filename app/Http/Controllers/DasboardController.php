<?php

namespace App\Http\Controllers;

use App\Models\Dasboard;
use App\Models\Pemasukan;
use App\Models\pengeluaran;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function view()
    {
        $data = Pemasukan::all();
       

        // Pastikan variabel totalNominal ada dalam array yang dikirim
        $totalNominalPemasukan = Pemasukan::sum('nominal');

        // Hitung total nominal pengeluaran
        $totalNominalPengeluaran = Pengeluaran::sum('nominal'); // Asumsikan ada model Pengeluaran

        $saldo = $totalNominalPemasukan - $totalNominalPengeluaran;
        $labels = ['January', 'February', 'March', 'April', 'May', 'June'];
        $data = [12, 19, 3, 5, 2, 3];
        
        $labels = ['January', 'February', 'March', 'April', 'May', 'June']; // Label dari database atau statis
        $data = [10, 20, 30, 40, 50, 60];
    
        return view('dasboard', [
            'data' => $data,
            'halaman' => 'dasboard',
            'totalNominalPemasukan' => $totalNominalPemasukan,
            'totalNominalPengeluaran' => $totalNominalPengeluaran, 
            'saldo' => $saldo,
            'labels' =>$labels,
        ]);
        
    }

    // public function index()
    // {
    //     // Fetch data from both tables
    //     $pemasukan = Pemasukan::all();
    //     $pengeluaran = pengeluaran::all();

    //     // Combine and sort by tipe
    //     $data = $pemasukan->merge($pengeluaran)->sortBy('tipe');

    //     // Define pagination parameters
    //     $perPage = 5; // Number of items per page
    //     $currentPage = LengthAwarePaginator::resolveCurrentPage();
    //     $currentItems = $data->slice(($currentPage - 1) * $perPage, $perPage)->values();

    //     // Create the paginator
    //     $paginatedData = new LengthAwarePaginator(
    //         $currentItems,
    //         $data->count(),
    //         $perPage,
    //         $currentPage,
    //         ['path' => Paginator::resolveCurrentPath()]
    //     );

    //     return view('history', ['data' => $paginatedData], ['halaman' => 'history']);
    // }

}
