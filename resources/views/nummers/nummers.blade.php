@extends('layouts.app')
@section('content')
    <h1>Nummers</h1>
    <ul class="list">
        <li class="list__item">
            <h2>Nummer</h2>
            <h2>Artiest</h2>
            <h2>Genre</h2>
        </li>
        @include('nummers.components.nummer--index')
    </ul>
@endsection

