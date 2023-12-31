@extends('layouts.app')

@section('content')


{{-- start --}}


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from earninglance.com/register.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Aug 2023 08:36:43 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <title>Register Earninglance</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/vendorss/bootstrap/css/bootstrap.min.html')}}" rel="stylesheet">
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
      <img src="{{ asset('frontend/assets/images/logo.png') }}" style="width: 150px;" >
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
        <div class="col-lg-4 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>Register</h2>
          </div>
        </div>
        <div class="col-lg-8 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
            <form id="contact" action="{{ route('register') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <fieldset>
                            <label for="name" class="col-form-label">{{ __('Name') }}</label>
                            <input id="name" placeholder="Name"  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-lg-6">
                        <fieldset>
                            <label for="last_name" class="col-form-label">{{ __('Last Name') }}</label>
                            <input id="last_name" placeholder="Last Name"  type="text" class="form-control @error('name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" required autofocus>
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </fieldset>
                    </div>

                    <div class="col-lg-6">
                        <fieldset>
                            <label for="username" class="col-form-label">{{ __('Username') }}</label>
                            <input id="username" placeholder="Username"  type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                            {{-- <span id="username-availability"></span> --}}
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-lg-6">
                        <fieldset>
                            <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                            <input id="email" placeholder="Email"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-lg-6">
                        <fieldset>
                            <label for="phone" class="col-form-label">{{ __('Phone Number') }}</label>
                            <input placeholder="Phone number"  id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-lg-6">
                        <fieldset>
                            <label for="refral" class="col-form-label">{{ __('Refral') }}</label>
                            <input id="refral" placeholder="Refral"  type="text" class="form-control" name="refral" value="{{ old('refral') }}" autocomplete="refral">
                          
                        </fieldset>
                    </div>
                    <div class="col-lg-6">
                        <fieldset>
                            <label for="password" class="col-form-label">{{ __('Password') }}</label>
                            <input id="password" placeholder="Password"  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-lg-6">
                        <fieldset>
                            <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" placeholder="Confirm Password"  type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </fieldset>
                    </div>
                    <div class="col-lg-12 text-end">
                        <fieldset>
                            <button type="submit" name="register" id="form-submit" class="main-button">Register</button>
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <p>Already have an Account? <a href="login.html">Login</a></p>
                    </div>
                </div>
                <div class="contact-dec">
                    <img src="{{ asset('frontend/assets/images/contact-decoration.png')}}" alt="">
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


  {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    $(document).ready(function() {
        $('#username').on('input', function() {
            let username = $(this).val();
            $.ajax({
                type: 'GET',
                url: '/check-username-availability/' + username,
                success: function(response) {
                    if (response.available) {
                       
                        $('#username-availability').html('<span style="color:green">&#10004; Available</span>');
                    } else {
                        $('#username-availability').html('<span style="color:red">&#10008; Username not available</span>');
                    }
                }
            });
        });
    });
</script>


<!-- Mirrored from earninglance.com/register.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Aug 2023 08:36:44 GMT -->
</html>

{{-- end --}}
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
