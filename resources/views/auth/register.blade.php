@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
  <div class="col-md-6">
    <div class="card p-4">
      <h3 class="card-title text-center mb-4">Register</h3>
      <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Your full name" required>
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        </div>
        <div class="form-group">
          <label for="password_confirmation">Confirm Password</label>
          <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Register</button>
      </form>
      <div class="text-center mt-3">
        <a href="{{ route('login') }}" class="link-primary">Already have an account? Login here!</a>
      </div>
    </div>
  </div>
</div>
@endsection
