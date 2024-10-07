@extends('dasboard.master')

@section('style')
    <link rel="stylesheet" href="css/halaman.css">
@endsection

@section('das')
<br>
    <br>
</div>
<div class="main">
    <div class="form">
            <form action="pemasukan" method="POST">
                @csrf
                <div class="judul"><label for="">Pemasukan</label></div>
                
                <div class="mb-6">
                    <label for="tanggal">Tanggal</label>
                    <input type="DATE" class="form-control" placeholder="Input Tanggal" name="tanggal" required>
                    
                </div>
                <div class="mb-3">
                    <label for="tanggal">Keterangan</label>
                    <input type="text" class="form-control" placeholder="Input Keterangan" name="keterangan" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal">Nominal</label>
                    <input type="text" class="form-control" placeholder="Input Nominal" name="nominal" required>
                </div>
                <input type="text" class="form-control" placeholder="pemasukan" value="pemasukan" name="tipe" hidden>
               
                <a href="pemasukan"><button type="submit" class="btn btn-success">Kirim</button></a>
            </form>
    </div>
</div>
@endsection
    
        
        {{-- @if (session()->has('pesan'))
        @foreach (sesion('pesan') as $item)
            @foreach ($item as $error)
                <p>{{$error}}</p>
            @endforeach
        @endforeach
            
        @endif
    @dd(session('pesan')) --}}
    {{-- @endsection --}}
 
