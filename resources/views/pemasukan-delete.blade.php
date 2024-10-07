@extends('dasboard.master')

@section('style')
    <link rel="stylesheet" href="style.css">
@endsection

@section('das')
<div class="mt-5 my-5 col-12">
   
    
    <h2 >Apakah kamu yakin ingin menghapus data : {{$data->tanggal}} ({{$data->keterangan}}) ({{$data->nominal}})</h2>
<form style="display: inline-block" action="/pemasukan-destroy/{{$data->id}}" method='post'>
    <button type="submit" class="btn btn-danger" method="post">Delete</button>
   @csrf
    @method('delete')
</form>
    
    <a href="/pemasukan"><button class="btn btn-primary">Cancel</button></a>
</div>
@endsection