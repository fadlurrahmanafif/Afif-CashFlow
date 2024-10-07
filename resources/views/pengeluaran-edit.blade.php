@extends('dasboard.master')

@section('style')
    <link rel="stylesheet" href="css/style.css">
@endsection

@section('das')
<br>

    <div class="card mt-5 col-6 m-auto">
       
           <h2>Pengeluaran</h2> 
    
        <div class="card-body ">
    <form action="/pengeluaran/{{$data->id}}" method="POST">
        @method('PUT')
        @csrf
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
            
        
        
        <a href="pengeluaran"><button type="submit" class="btn btn-success">Kirim</button></a>
    </form>
</div>
    </div>
@endsection