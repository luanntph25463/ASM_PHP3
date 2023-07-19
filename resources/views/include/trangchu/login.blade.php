@extends('include.layouts')
@section('content')
<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">

        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Login to <strong>UNICAT</strong></h3>
            <p class="mb-4">chúc quý khách có trải nghiệm tốt nhất</p>
            @if ($errors->any())

<div class="alert alert-danger alert-dismissible" role="alert">

<ul>

@foreach ($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>

@endif
            <form action="{{ route('user.login') }}" method="POST">
                @csrf
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" value="{{ old('email') }}" name="email" placeholder="your-email@gmail.com" id="email">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control"value="{{ old('password') }}" placeholder="Your Password" id="password">
              </div>

              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
              </div>

              <button type="submit" value="Log In" class="btn btn-block btn-primary">Login
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>


  </div>

@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/main_styles.css') }}">
<link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
{{--
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css"> --}}

<!-- Style -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection
@section('js')
<script src="{{ asset('plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
@endsection
