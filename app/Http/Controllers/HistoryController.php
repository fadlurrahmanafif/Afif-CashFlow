<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Pemasukan;
use App\Models\pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class HistoryController extends Controller
{
    public function index()
{
    // Fetch data from both tables
    $pemasukan = Pemasukan::all();
    $pengeluaran = pengeluaran::all();

    // Combine and sort by tipe (assuming 'tipe' field exists and is used for sorting)
    $data = $pemasukan->merge($pengeluaran)->sortBy('tipe');

    // Define pagination parameters
    $perPage = 5; // Number of items per page
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $currentItems = $data->slice(($currentPage - 1) * $perPage, $perPage)->values();

    // Create the paginator
    $paginatedData = new LengthAwarePaginator(
        $currentItems,
        $data->count(),
        $perPage,
        $currentPage,
        ['path' => Paginator::resolveCurrentPath()]
    );

    return view('history', ['data' => $paginatedData, 'halaman' => 'history']);
}

}
