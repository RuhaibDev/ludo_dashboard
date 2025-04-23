@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
  <div class="col-md-6">
    <div class="card p-4">
      <h3 class="text-center mb-4">Login</h3>

      @if(session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      @endif

      <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" 
                 value="{{ old('email') }}" required autofocus>
          @error('email')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
          @error('password')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </form>

      <p class="text-center mt-3">
        <a href="{{ route('register') }}">Don’t have an account? Register</a>
      </p>
    </div>
  </div>
</div>
@endsection
