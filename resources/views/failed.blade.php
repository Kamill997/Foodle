<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('css/success-error.css') }}">
<script src="{{ asset('scripts/success.js') }}" defer></script>
<title>Pagamento Effettuato</title>
</head>

<body>
    <div class="Pagamento">
        <img src=img/Failed.png>
         @if(!empty($message))
        <h1>{{ $message }}</h1>
        @endif
    </div>
</body>
</html>