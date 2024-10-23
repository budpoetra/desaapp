@extends('layouts.index')

@section('content')
  <div class="gray-bg">
    <div class="container">

      <!-- Outer Row -->
      <div class="row justify-content-center mt-30">

        <div class="col-xl-10 col-lg-12 col-md-9">

          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-login-image d-flex align-content-center" style="padding: 3em">
                  <img src="{{ asset('img/login-image.png') }}" alt="" width="100%" />
                </div>
                <div class="col-lg-6">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900">Welcome Back!</h1>
                      @if (session('loginError'))
                        <small class="text-danger" style="margin: -5% 0 3% 0">{{ session('loginError') }}</small>
                      @endif
                      @if (session('success'))
                        <small class="text-success" style="margin: -5% 0 3% 0">{{ session('success') }}</small>
                      @endif
                    </div>
                    <form class="form-contact contact_form mt-3" method="POST" action="/login">
                      @csrf
                      <div class="form-group">
                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                          id="email" name="email" placeholder="Enter Email Address..." value="{{ old('email') }}"
                          required autofocus>
                        @error('email')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <input type="password"
                          class="form-control form-control-user @error('password') is-invalid @enderror" id="password"
                          name="password" placeholder="Password" required>
                        @error('password')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <input type="checkbox" class="custom-control-input" id="customCheck">
                          <label class="custom-control-label pt-1" for="customCheck">Remember
                            Me</label>
                        </div>
                      </div>
                      <button type="submit" class="genric-btn danger radius btn-block">Login</button>
                    </form>
                    <hr>
                    <div class="text-center" style="margin-top: -3em">
                      <a class="small text-primary" href="/forgot-password">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                      <a class="small text-primary" href="/register">Create an Account!</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>
  </div>
@endsection
