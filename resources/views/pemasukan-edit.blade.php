@extends('dasboard.master')

@section('style')
    <link rel="stylesheet" href="css/halaman.css">
@endsection

@section('das')
<br>
<div class="mt-5 col-6 m-auto">
    <form action="/pemasukan/{{$data->id}}" method="POST">
        @method('PUT')
        @csrf
        <div class="judul"><label for="">Pemasukan</label></div>
        <div class="mb-3">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control"  name="tanggal" value="{{$data->tanggal}}" required>
        </div>
            
            <div class="mb-3">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control"  name="keterangan" value="{{$data->keterangan}}" required>
            </div>

             <div class="mb-3">
                <label for="nominal">Nominal</label>
                <input type="text" class="form-control"  name="nominal" value="{{$data->nominal}}" required>
             </div>
            
        
        
        <a href="pemasukan"><button type="submit" class="btn btn-success">Kirim</button></a>
    </form>
</div>
@endsection