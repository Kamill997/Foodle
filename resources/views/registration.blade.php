@extends('layouts.auth')

@section('title', 'Registrati')

@section('script')
<script src="{{ asset('scripts/registration.js') }}" defer></script>
@endsection


@section('content')

<form class='form' method='post' action="{{ route('registration') }}" enctype="multipart/form-data">
    @csrf
    <h1 class="title">Registrazione</h1>
    <div class="Nomi">
        <div class="Nome @error('Nome') errore @enderror">
            <span>Inserisci Nome</span>
            <div><input type="text" class="login-input" name="Nome" placeholder="Nome" value="{{ old('Nome') }}"></div>
        </div>
        <div class="Cognome @error('Cognome') errore @enderror">
            <span>Inserisci Cognome</span>
            <div><input type="text" class="login-input" name="Cognome" placeholder="Cognome" value="{{ old('Cognome') }}"></div>
        </div>
    </div>
    <div class="Username @error('Username') errore @enderror">
        <span>@error('Username') {{ $message }} @enderror</span>
        <div><input type="text" class="login-input" name="Username" placeholder="Username" value="{{ old('Username') }}"></div>
    </div>
    <div class="Email @error('Email') errore @enderror">
        <span>@error('Email') {{ $message }} @enderror</span>
        <div><input type="text" class="login-input" name="Email" placeholder="Email" value="{{ old('Email') }}"></div>
    </div>
    <div class="Password @error('Password') errore @enderror">
        <span>@error('Password') {{ $message }} @enderror</span>
        <div><input type="password" class="login-input" name="Password" placeholder="Password"></div>
    </div>
    <div class="Pic @error('Pic') errore @enderror">
        <span>@error('Pic') {{ $message }} @enderror</span>
        <div><input type="file" id="pic" class="login-input" name="Pic" accept='.jpg, .jpeg, image/gif, image/png'></div>
    </div>
    <div class="submit">
        <input type="submit" id="submit" name="submit" value="Registrati">
    </div>
    <p class="link">Hai già un account? <a href="{{ route('login') }}">Login</a></p>
</form>
@endsection