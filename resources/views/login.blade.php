@extends('components.master')

@section('style')
    <link rel="stylesheet" href="login.css">
@endsection

@section('isi')

   



        {{-- <div class="wrapper">
            <form class="p-3 mt-3" method="post" action="{{ route('log') }}">
                @csrf
                <div class="text-center mt-0 name">
                    <h2>Login</h2>
                </div>
                <label for="form-label" style="d-flex align-items-center">Email</label>
                    <div class="form-field d-flex align-items-center">
                        <span class="far fa-user"></span>
                        <input type="email" name="email" id="email" placeholder="Masukkan Email">
                    </div>
                    <br>
                    <label for="form-label" style="d-flex align-items-center">Password</label>
                    <div class="form-field d-flex align-items-center">
                        <span class="fas fa-key"></span>
                        <input type="password" name="password" id="pwd" placeholder="Masukkan Password">
                    </div>
                    <a href="/"><button class="btn mt-3" type="submit">Login</button></a>
                    <br>
                <label class="txt"><a href="{{route('home')}}"><h6><<< Back to Home</h6></a></label>
            
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></script> --}}
       

        <link id="theme-style" rel="stylesheet" href="css/login.css">

    </head> 
    
    <body class="app app-login p-0">    	
        <div class="row g-0 app-auth-wrapper">
            <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
                <div class="d-flex flex-column align-content-end">
                    <div class="app-auth-body mx-auto">	
                        <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="{{asset('app-logo.svg')}}" alt="logo"></a></div>
                        <h2 class="auth-heading text-center mb-5">Log in to Dasboard</h2>  	
                            @if(Session::has('status'))
                            <div class="alert alert-danger " style="text-align" role='alert'>
                              {{Session::get('message')}}
                            </div>
                                @endif
                        <div class="auth-form-container text-start">
                            
                            <form class="auth-form login-form p-3 mt-3" method="post" action="{{ route('log') }}"> 
                                @csrf        
                                <div class="email mb-3">
                                    <label class="sr-only" for="signin-email">Email</label>
                                    <input id="email" name="email" type="email" class="form-control signin-email" placeholder="Email address" required="required">
                                </div><!--//form-group-->
                                <div class="password mb-3">
                                    <label class="sr-only" for="signin-password">Password</label>
                                    <input id="password" name="password" type="password" class="form-control signin-password" placeholder="Password" required="required">
                                    <div class="extra mt-3 row justify-content-between">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="RememberPassword">
                                                <label class="form-check-label" for="RememberPassword">
                                                Remember me
                                                </label>
                                            </div>
                                        </div><!--//col-6-->
                                        <div class="col-6">
                                            <div class="forgot-password text-end">
                                                <a href="reset-password.html">Forgot password?</a>
                                            </div>
                                        </div><!--//col-6-->
                                    </div><!--//extra-->
                                </div><!--//form-group-->
                                <div class="text-center">
                                 <a href="/"><button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button></a>   
                                </div>
                            </form>
                            
                            <div class="auth-option text-center pt-5">No Account? Sign up <a class="text-link" href="signup.html" >here</a>.</div>
                        </div><!--//auth-form-container-->	
    
                    </div>

                </div><!--//flex-column-->   
            </div>

                    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
                        <div class="auth-background-holder">
                        </div>
                        <div class="auth-background-mask"></div>
                        <div class="auth-background-overlay p-3 p-lg-5">
                            <div class="d-flex flex-column align-content-end h-100">
                                <div class="h-100"></div>
                               x
                            </div>
                        </div><!--//auth-background-overlay-->
                    </div><!--//auth-background-col-->
                
                </div><!--//row-->
@endsection