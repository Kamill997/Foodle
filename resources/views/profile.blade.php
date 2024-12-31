@extends('layouts.homeview')

@section('css-script')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
<script src="{{ asset('scripts/profile.js') }}" defer></script>
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
<div class="Navlat">
        <div class="profilo">
            <label id="appendi" for="upload">
            <img src="{{ asset('storage/'.$user->Pic) }}">
            </label>
            <div class="errore-msg hidden">

            </div>
            <form id="change" name="change" method="POST" enctype="multipart/form-data">
            @csrf           
                <input type="file" id="upload" name="Upload" accept='.jpg, .jpeg, image/gif, image/png'>
            </form>
            <div class="User">
                <h3>{{ $user['Username'] }}</h3>
            </div>
        </div>

        <div class="Navlat-info">
            <div class="sect">
                <a href="{{ route('profile') }}">Profilo</a>
                <hr>
            </div>
        </div>
    </div>

    <div class="Contenuto">
        <h2>RIGUARDO A TE</h2>
        <div class="Informazioni">
            <div class="Informazioni-elem">
                <p>Nome: {{ $user['Nome'] }}</p>
                <p>Cognome: {{ $user['Cognome'] }}</p>
                <p>Email: {{ $user['Email'] }}</p>
            </div>
        </div>

        <h2>RIPRISTINA PASSWORD</h2>
        <div class="Informazioni linea">
            <div class="Informazioni-elem">

                <div class="successo-msg hidden">

                </div>

                <div class="errore-msg hidden">

                </div>

                <form id="reset" name="reset" method="POST">
                    @csrf
                    <div class="Old-Pass @error('old_pass') errore @enderror">
                        <label>Vecchia Password</label>
                        <div><input type="password" id="old_pass" name="old_pass" placeholder="Inserisci la tua vecchia password"></div>
                    </div>

                    <div class="New-Pass @error('new_pass') errore @enderror">
                        <label>Nuova Password</label>
                        <div><input type="password" id="new_pass" name="new_pass" placeholder="Inserisci la tua nuova password"></div>
                    </div>

                    <div class="Repeat-Pass @error('repeat_pass') errore @enderror">
                        <label>Ripeti Password</label>
                        <div><input type="password" id="repeat_pass" name="repeat_pass" placeholder="Ripeti la tua password"></div>
                    </div>

                    <div class="submit">
                        <input type="submit" id="submit" name="submit" value="Ripristina">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection