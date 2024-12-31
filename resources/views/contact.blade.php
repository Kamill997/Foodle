@extends('layouts.homeview')

@section('css-script')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}"/>
<script src="{{ asset('scripts/contact.js') }}" defer></script>
@endsection

@section('nav')
                    <div class="Info">
                      <a href="{{ route('home') }}">Home</a>
                      <a href="{{ route('contact') }}">Contattaci</a>
                    <div class="Tendina">
                        <button class="Tendina-button">{{ $user->Username }}</button>
                        <div class="Tendina-content">
                            <a href="{{ route('profile') }}">Profilo</a>
                            <a href="{{ route('cart') }}">Carrello</a>
                            <a href="{{ route('logout') }}">Logout</a>
                        </div>
                    </div>
                </div>
        <div class="Menu">
            <div></div>
            <div></div>
            <div></div>
        </div>
</nav>
</header>
@endsection

@section('content')
<form class="form" method="POST" id="contact">
@csrf
  <h2>CONTATTACI</h2>

  <div class="successo-msg">

  </div>

  <div class="errore-msg">

  </div>

    <div class="Email @error('Email') errore @enderror">
        <label>Email</label>
        <span>Email non valida</span>
        <div><input type="text" id="email" name="Email" placeholder="Indicaci a quale email contattarti" value="{{ old('Email') }}"></div>
    </div>
    <div class="Oggetto @error('Oggetto') errore @enderror">
        <label>Oggetto</label>
        <span>Inserisci la tua richiesta</span>
        <div><input type="text" id="messaggio" name="Messaggio" placeholder="Inserisci qui la tua richiesta"/></div>
    </div>
    <div class="Messaggio @error('Messaggio') errore @enderror">
        <label>Dettagli Aggiuntivi</label>
        <span>Inserisci Dettagli</span>
        <div><textarea id="dettagli" name="Dettagli" placeholder="Scrivi qui per ulteriori dubbi" rows="3" maxlength="5000"></textarea></div>
    </div>
    <button>Manda Messaggio</button>
</form>
@endsection

