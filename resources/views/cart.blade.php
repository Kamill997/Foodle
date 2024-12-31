@extends('layouts.homeview')

@section('css-script')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}"/>
<script src="{{ asset('scripts/cart.js') }}" defer></script>
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
    <section id="item">
        <div class="Contenitore">
            <div class="Contenuto">
            @if(count($cart) > 0)
                <h1>CARRELLO</h1>
                    <div class="cart">
                        <table class="table">
                            <tbody>
        
                            </tbody>                          
                        </table>
                    </div>
@else

@endif   
            </div>
        </div>
    </section>
@endsection