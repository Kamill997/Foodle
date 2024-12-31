<html>
    <head>
        <Title>Foodle</Title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lora:wght@600&family=Oswald&family=Raleway:wght@300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet">
        @yield('css-script')
    </head>

    <body>
        <header id="Intestazione">
              <nav class="Nav">
                <h2 id="Logo">Foodle</h2>
                @yield('nav')
                
        @yield('content')
        <footer id="Chiusura">
              <div class="Info">
                <div id="Crediti">
                  <div>
                    <h3>FOODLE</h3>
                    <div>
                      <address>Ingegneria Informatica-DIEEI</address>
                      <p><a name="Contatta">Camiolo Luca O46002187</a></p>
                    </div>
                  </div>
                  <div class="Menu">
                    <h3>Menu</h3>
                    <div>
                    <ul>
                      <li><a href="{{ route('profile') }}">Il mio account</li></a>
                    </ul>
                    </div>
                  </div>
                </div>
              </div>
          </footer>
    </body>
</html>