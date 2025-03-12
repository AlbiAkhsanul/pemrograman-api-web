@extends('layouts.main')

@section('container')
<div class="mt-4" style="height: 50px">
</div>
<div class="row justify-content-center">
    <div class="col-lg-4 mt-4">
      @if (session()->has('success'))
      {{-- Registration SUccess --}}
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      {{-- Login Failed --}}
      @if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
        <main class="form-signin w-100 m-auto">
            <p class="text-secondary"><span class="navbar-brand fw-bold text-danger fs-1 me-1">DOG Blog<i class="bi bi-lightbulb"></i></span>My API Testing Blog Page</p>
            <form action="/login" method="post">
              {{-- CSRF token --}}
              @csrf

              <p class="h3 mb-3 fw-normal">Please login</p>
              <div class="form-floating mb-1">
                <input type="username" class="form-control rounded-top @error('username') is-invalid @enderror" name="username" id="username" placeholder="name@example.com" value="{{old('username')}}" required autofocus>
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
          
              {{-- <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div> --}}
              <button class="w-100 btn btn-lg btn-danger mt-3" type="submit">Login</button>
            </form>
            <hr class="bg-danger border-2 border-top border-danger">  
        </main>
        {{-- <p class="mt-5 mb-3 text-body-secondary">&copy; 2023–2023</p> --}}
    </div>
</div>
@endsection