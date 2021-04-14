@extends('layouts.app')
@section('content')
<section class="content__nummers">
    <h1>Nummers</h1>
    <a class="content--hyperlink__button" href="/nummerToevoegen">Voeg nummer toe</a>
    <ul class="list">
        <li class="list__item hidden">
            <h2>Nummer</h2>
            <h2>Artiest</h2>
            <h2>Genre</h2>
        </li>
        @include('nummers.components.nummer--index')
    </ul>
    <div id="js--checkVoorPauze" onclick="pauze('{{$timer->tijd}}')"></div>
</section>
@endsection

