@extends('layouts.auth')

@section('title' ,'Login')

@section('script')
<script src="{{ asset('scripts/login.js') }} " defer></script>
@endsection

@section('content')

<form class="form" method="post" name="login">
  @csrf
  <h1 class="title">Login</h1>
  <div class="username">
    <div><input type="text" class="login-input" name="Username" placeholder="Username"></div>
  </div>
  <div class="password">
    <div><input type="password" class="login-input" name="Password" placeholder="Password" /></div>
  </div>
  <div class="submit">
    <div><input type="submit" value="Login" name="submit" /></div>
  </div>
  <p class="link">Non hai un account? <a href="{{ route('registration') }}">Registrati Adesso</a></p>
</form>
@endsection