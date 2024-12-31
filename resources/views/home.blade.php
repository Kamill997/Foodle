@extends('layouts.homeview')

@section('css-script')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<script src="{{ asset('scripts/index.js') }}" defer></script>
@endsection

@section('nav')
@if(!isset($user))
<div class="Info">
  <a href="{{ route('home') }}">Home</a>
  <a href="{{ route('contact') }}">Contattaci</a>
  <a class="bottone" href="{{ route('login') }}">Accedi/Registrati</a>
</div>
@else
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
@endif
<div class="Menu">
  <div></div>
  <div></div>
  <div></div>
</div>
</nav>
@endsection

@section('content')
<div class="Benvenuto">
  <div>
    <h2>Perchè non farsi un bel boccone</h2>
    <h3>
      Ordina ciò che vuoi,quando vuoi e dove vuoi
    </h3>
    <a href="{{ route('menu') }}" class="Bottone">Guarda adesso</a>
  </div>
</div>
</header>
<section id="Centro">
  <h2>Ecco alcuni dei ristoranti più apprezzati dai nostri clienti</h2>
  <div class="Marchi">

  </div>
  <div class="Marchi-2">

  </div>
</section>
<section id="Contenitore-flex">
  <div class="Box">
    <div class="Sinistra">

    </div>
    <div class="Destra">
      <p>
        <strong><em>The discovery of a new dish does more for the happiness of the human race than the discovery of a star.</em></strong>
      </p>
      <p>
        <em>Anthelme Brillat-Savarin</em>
      </p>
    </div>
  </div>
</section>
<section id="Fine">
  <h1>GALLERIA</h1>
  <div id="Galleria">
    <div class="Foto">

    </div>
  </div>
</section>
@endsection