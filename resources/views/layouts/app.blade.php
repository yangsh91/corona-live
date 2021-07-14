<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="assets/img/icons/icon-48x48.png" rel="stylesheet">
        
        <title>Corona Live For Education</title>

        <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css">
        
        <link rel="manifest" href="{{ asset('assets/js/manifest.json') }}">
    </head>
    <body>
        <div class="wrapper">
            @yield('content')
        </div>        
    </body>
</html>
