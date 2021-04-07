@extends('layouts.app')
@section('content')
    <h1>Afspeellijsten</h1>
    <ul class="list">
        <li class="list__item hidden">
            <h2>Naam</h2>
            <h2>Aantal Nummers</h2>
            <h2>Humeur</h2>
        </li>
        @include('afspeellijsten.components.afspeellijst--index')
    </ul>
@endsection

