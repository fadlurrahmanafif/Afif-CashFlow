@extends('dasboard.master')



@section('das')
<br>
@if (Session::has('message'))
    <div class="alert alert-{{ Session::get('status') == 'success' ? 'success' : 'danger' }} alert-dismissible fade show" role="alert">
        {{ Session::get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<br>
<div class="card m-auto col-8">
    
       <h2>Pengeluaran</h2> 
   
    <div class="card-body ">

    <form action="pengeluaran" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" placeholder="Input Tanggal" name="tanggal" required>
        </div>
            
            <div class="mb-3">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" placeholder="Input Keterangan" name="keterangan" required>
            </div>

             <div class="mb-3">
                <label for="nominal">Nominal</label>
                <input type="text" class="form-control" placeholder="Input Nominal" name="nominal" required>
             </div>
             
             <input type="text" class="form-control" placeholder="pengeluaran" value="pengeluaran" name="tipe" hidden>
            
        
        
        <a href="pengeluaran"><button type="submit" class="btn btn-success">Kirim</button></a>
    </form>
</div>
</div>
@endsection