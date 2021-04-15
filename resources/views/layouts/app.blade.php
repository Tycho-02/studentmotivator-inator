<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <title>@yield('title')</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="/js/main.js" defer></script>
</head>
<body class="grid">
    <button class="menu--button__action" onclick="window.location='/'" ><i class="fas fa-long-arrow-alt-left fa-2x"></i></button>
    <section class="content">
        @yield('content')
   </section>
   <section class="muziekSpeler">
        <!-- kijk welke variabelen bestaat en displayed dat wat er bij hoort -->
        @isset($nummers)
            @include('nummers.components.muziekSpeler--index')
        @endisset
        @isset($afspeellijstnummers)
            @include('afspeellijsten.components.muziekSpeler--index')
        @endisset
   </section>
   @include('sweetalert::alert')
</body>
</html>

