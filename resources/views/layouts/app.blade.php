<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    
    <title>Document</title>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script src="/js/msin.js"></script>

</head>
<body class="grid">
   <aside class="menu">
       @yield('menu')
       <figure class="menu__figure">
           <img class="menu__img" src="" alt="">
       </figure>
       <ul class="menu__list list">
            <li class="menu__list__item"><a href="#">user</a></li>
            <li class="menu__list__item"><a href="/afspeellijst">Afspeellijsten</a></li>
            <li class="menu__list__item"><a href="/nummers">Nummers</a></li>
            <li class="menu__list__item"><a href="/nummerToevoegen">Voeg nummer toe</a></li>
    </ul>
   </aside>
   <section class="content">
        @yield('content')
   </section>
   <section class="muziekSpeler">
        <!-- @yield('muziekSpeler') -->
        @isset($nummers)
            @include('nummers.components.muziekSpeler--index')
        @endisset
        @isset($afspeellijstnummers)
            @include('afspeellijsten.components.muziekSpeler--index')
        @endisset
   </section>
</body>
</html>

