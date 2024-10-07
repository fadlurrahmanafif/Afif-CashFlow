@extends('dasboard.master')

@section('style')
    <link rel="stylesheet" href="style.css">
@endsection

@section('das')
<div class="button">
  <div class="my-5 col-2">
    <br>  
  </div>

  </div>

    
<div class="table col-12 col-sm-12 col-md-12 col-lg-12">
  <div class="mt-5 m-auto col-12">
    <table class="table table-striped table-hover table-responsive-md">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Keterangan</th>
          <th scope="col">Nominal</th>
          <th scope="col">Tipe</th>
        </tr>
      </thead>
      @foreach ($data as $item)
      <tbody>
          <tr>
            <th>{{$loop->iteration}}</th>
            <td>{{$item['tanggal']}}</td>
            <td>{{$item['keterangan']}}</td>
            <td>{{$item['nominal']}}</td>
            <td>{{$item['tipe']}}</td>
           
  
          </tr>
        </tbody>
      @endforeach
      
    </table> 
</div>

</div>

<div class="next">
      
  {{$data->withQueryString()->links()}} 

</div>
@endsection
