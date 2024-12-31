@extends('layouts.homeview')

@section('css-script')
<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('scripts/checkout.js') }}" defer></script>
@endsection

@section('nav')
                    <div class="Info">  
                      <a href="{{ route('home') }}">Home</a>
                      <a href="{{ route('contact') }}">Contattaci</a>
                      <a href="{{ route('menu') }}">Menu</a>
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
<h2 class="check">CHECKOUT</h2>
<div class="flex-wrap2">
    <div class="info-2">
        <div class="Informazione">
            <form id="validate" method="POST" action="{{ route('checkout') }}">
                @csrf
                <div class="flex-wrap">
                    <div class="dati">
                        <h3 class="check">DATI DI FATTURAZIONE</h3>
                        <div class="Email @error('Email') errore @enderror">
                            <label>Email</label>
                            <span>Email non valida</span>
                            <div><input type="text" id="email" name="Email" placeholder="es. andrea@gmail.com" value="{{ old('Email') }}"></div>
                        </div>
                        <div class="Cellulare @error('Cellulare') errore @enderror">
                            <label>Cellulare</label>
                            <span>Numero di telefono non valido</span>
                            <div><input type="text" id="cellulare" name="Cellulare" placeholder="es. 3xx xxxxxxx" value="{{ old('Cellulare') }}"></div>
                        </div>
                        <div class="Indirizzo @error('Indirizzo') errore @enderror">
                            <label>Indirizzo</label>
                            <span>Inserisci indirizzo di residenza</span>
                            <div><input type="text" id="indirizzo" name="Indirizzo" placeholder="es. Via Monte Bianco" value="{{ old('Indirizzo') }}"></div>
                        </div>
                        <div class="Provincia @error('Provincia') errore @enderror"> 
                            <label>Provincia</label>
                            <span>Inserisci la provincia</span>
                            <div><input type="text" id="citta" name="Prov" placeholder="es. CT" value="{{ old('Provincia') }}"></div>
                        </div>
                        <div class="Proprietario @error('Proprietario') errore @enderror">
                            <label>Proprietario Carta</label>
                            <span>Inserisci il proprietario della carta</span>
                            <div><input type="text" id="prop" name="Prop" placeholder="es. {{ $user['Nome'] }} {{ $user['Cognome'] }}"></div>
                        </div>                       
                        <label>Card
                        <div id="card-element"></div>
                        </label>  
                        <div id="card-errors" role="alert"></div>
                    </div>             
                </div>
                <button id="checkout-button" class="effettua">Effettua ordine</button>
            </form>
        </div>
    </div>
    <div class="info-3">
        <div class="item">
            <h4>CARRELLO</h4>
        
        </div>
    </div>
</div>
@endsection