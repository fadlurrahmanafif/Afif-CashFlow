@extends('components.master')

@section('style')
    <link rel="stylesheet" href="login.css">
@endsection

@section('isi')

   


<div class="main ">  	
    @if(Session::has('status'))
    <div class="alert alert-danger " style="text-align" role='alert'>
      {{Session::get('message')}}
    </div>
        @endif
        <div class="signup">
            <form method="post" action="{{ route('') }}">
                @csrf
                <label aria-hidden="true" class="txt">Register</label>
                <label ><h5>Email</h5></label>
                <input type="email" name="email" placeholder="Email" required>
                <label ><h5>Password</h5></label>
                <input type="password" name="password" placeholder="Password" required>
               
                <button type="submit">Login</button>
                <label class="txt"><a href="{{route('home')}}"><h6><<< Back to Home</h6></a></label>
            </form>
        </div>

       
@endsection