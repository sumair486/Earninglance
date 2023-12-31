@extends('layouts.app')

@section('content')
<div class="container">

    {{-- start --}}

    
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from earninglance.com/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Aug 2023 08:36:43 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <title>Login Earninglance</title>
</head>
<body>
  <!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->
  

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="/" class="logo">
            <img src="{{ asset('frontend/assets/images/logo.png')}}" style="width: 150px;" >
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="/">Home</a></li>
              {{-- <li class="scroll-to-section"><a href="index-2.html#plans">Plans</a></li>
              <li class="scroll-to-section"><a href="index-2.html#about">About</a></li>
              <li class="scroll-to-section"><a href="index-2.html#contactus">Contact</a></li> --}}
              <li class="scroll-to-section"><a href="{{route('login')}}">Login</a></li>
              <li class="scroll-to-section"><div class="main-red-button"><a href="{{route('register')}}">Register</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/fav.png')}}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('frontend/vendors/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

<!-- Additional CSS Files -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-space-dynamic.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/animated.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css')}}">


  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>Login</h2>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
            <form id="contact" method="POST" action="{{ route('login') }}">
                @csrf
            
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                        <fieldset>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </fieldset>
                    </div>
                    {{-- <div class="col-lg-12">
                        <fieldset>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </fieldset>
                    </div> --}}
                    <div class="col-lg-12">
                        <fieldset>
                            <button type="submit" class="main-button">
                                {{ __('Login') }}
                            </button>
                        </fieldset>
                    </div>
                    <div class="col-lg-12 mt-2">
                        
                            <a href="{{ route('register') }}">Register Here</a>
                            <a class="pull-right" href="{{ route('password.request') }}">Forgot Password</a>
                        
                    </div>
                </div>
                <div class="contact-dec">
                    <img src="{{ asset('frontend/assets/images/contact-decoration.png') }}" alt="">
                </div>
            </form>
            
        </div>
      </div>
    </div>
  </div>

  <a class="whatsapp" href="https://api.whatsapp.com/send?phone=03477734604" >
    <h1 ><i class="fa-brands fa-whatsapp"></i></h1>
</a>
<style>
    .whatsapp{
        width: 70px;
        height: 70px;
        background-color: white;
        position: fixed;
        bottom: 2%;
        right: 2%;
        border-radius: 50%; 
        text-align: center;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .whatsapp h1{
        color: rgb(79, 206, 93);
        font-size: 40px;
        margin: 12px;
    }
</style>
<!--<footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
          <p>© Copyright 2022 Earninglance Co. All Rights Reserved. 
          
          <br>Developed by <a rel="nofollow" target="_blank" href="https://zedxsol.com">ZedX Solutions</a></p>
        </div>
      </div>
    </div>
  </footer>-->
  <!-- Scripts -->
  <script src="{{ asset('frontend/kit.fontawesome.com/f5a5bc4a23.js')}}" crossorigin="anonymous"></script>
  <script src="{{ asset('frontend/vendors/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('frontend/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/owl-carousel.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/animation.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/imagesloaded.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/templatemo-custom.js')}}"></script>
</body>

<!-- Mirrored from earninglance.com/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Aug 2023 08:36:43 GMT -->
</html>


  
@endsection
