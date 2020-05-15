<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('js/main-js.js') }}"></script>
    </head>
    <body>
<div class="aside">
    <div class="web-name">
        <div class="logo">F</div>
        <span class="logo-name">FEEDBACK
        APP</span>
    </div>
</div>
<div class="main">
    @yield('content')
</div>

    </body>
</html>