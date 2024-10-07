<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PengeluaranController extends Controller
{
    public function view(Request $request)
    {
        $keyword = $request->keyword;
        
        $data = Pengeluaran:: where('keterangan','LIKE','%'.$keyword.'%')
        ->orWhere('nominal','LIKE','%'.$keyword.'%')
        ->orWhere('tanggal','LIKE','%'.$keyword.'%')
        ->paginate(5);
           return view('pengeluaran',["data"=>$data],mergeData: ['halaman' => 'pengeluaran'] );
    }

    public function create()
    {
        $data= pengeluaran::all();
           return view('pengeluaran-add',["data"=>$data],['halaman' => 'pengeluaran-add'] );
    }

    public function add (Request $request)
    {
    
            // Ambil total pemasukan dan pengeluaran
    $totalNominalPemasukan = Pemasukan::sum('nominal');
    $totalNominalPengeluaran = Pengeluaran::sum('nominal');
    
    // Hitung saldo saat ini
    $saldoSaatIni = $totalNominalPemasukan - $totalNominalPengeluaran;
    
    // Ambil nominal pengeluaran dari request
    $nominalPengeluaran = $request->input('nominal');

    // Cek apakah saldo mencukupi untuk pengeluaran baru
    if ($saldoSaatIni < $nominalPengeluaran) {
        // Jika saldo tidak cukup, kembalikan pesan error
        Session::flash('status', 'error');
        Session::flash('message', 'Saldo tidak mencukupi!');
        return redirect('/pengeluaran-add'); // Kembalikan ke form tambah pengeluaran
    }

    // Jika saldo mencukupi, simpan pengeluaran
    $pengeluaran = Pengeluaran::create($request->all());

    if ($pengeluaran) {
        Session::flash('status', 'success');
        Session::flash('message', 'add data succes!');
    }

    return redirect('/pengeluaran');
       
    }

    public function edit (Request $request,$id)
    {
        $data = pengeluaran::findOrFail($id);
        return view('pengeluaran-edit',["data"=>$data],['halaman' => 'pengeluaran-edit']);
    }

    public function update (Request $request,$id){
        $data = pengeluaran::findOrFail($id);
        $data->update($request->all());
        return redirect('/pengeluaran');
    }

    // public function delete($id){
    //     $data = pengeluaran::findOrFail($id);
    //     return view('pengeluaran-delete',["data"=>$data],['halaman' => 'pengeluaran-delete']);
    //    }
    
       public function destroy($id)
       {
        $deletedPengeluaran = pengeluaran::findOrFail($id);
        $deletedPengeluaran->delete();
        if( $deletedPengeluaran){
            Session::flash('status','danger');
            Session::flash('message','delete data succes!');
        }
        return redirect('/pengeluaran');
       }
}
