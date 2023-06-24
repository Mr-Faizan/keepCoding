@extends('layouts.loginlayout')
@section('content')
<body class="hold-transition login-page"  style="background-image: url('{{ asset('/images/login/test.jpg')}}'); background-repeat: no-repeat;background-attachment: fixed; background-size: 100% 100%;">
   <div class="login-box">
      <div class="login-logo">
         <a href="/">  {{ env('APP_NAME') }} </a>
      </div>
      <div class="card">
         <div class="card-body login-card-body">
            <form method="POST" action="{{ route('login') }}">
               @csrf
               <div class="input-group mb-3">
                  <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                     </div>
                  </div>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               <div class="input-group mb-3">
                  <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                     </div>
                  </div>
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               <div class=" row">
                  <div class="col-8">
                     <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                        Remember Me
                        </label>
                     </div>
                  </div>
                  <div class="col-4">
                     <button type="submit" class="btn btn-primary btn-block">
                     {{ __('Login') }}
                     </button>
                  </div>
               </div>
               <p class="mb-1">
                  @if (Route::has('password.request'))
                  <a class="text-center" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                  </a>
                  @endif
               </p>
               <p class="mb-0">
                  <a href="/register" class="text-center">Register a new account</a>
               </p>
            </form>
         </div>
      </div>
   </div>
</body>
@endsection
