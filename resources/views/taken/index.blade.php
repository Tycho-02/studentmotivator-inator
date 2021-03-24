@extends('taken.taakDefault')

<!-- Page Title -->
@section('title')
    {{"Taken"}}
@endsection

<!-- Content -->
@section('content')
    <h1>Taken:</h1>
    <ul>
        @foreach ($taken as $taak)
        <a href="/taakverwijderen/{{$taak->id}}">
        <ul>
            <li>Titel: {{$taak->title}}</li>
            <li>Omschrijving: {{$taak->omschrijving}}</li>
            <li>Status: {{$taak->status}}</li>
            <li>Label: {{$taak->label}}</li>
            <li>Prioriteit: {{$taak->prioriteit}}</li>
            <li>Deadline: {{$taak->deadline}}</li>
            <li>Uitvoerdatum: {{$taak->uitvoerdatum}}</li>
        </ul>
        </a>
        <hr>
        @endforeach
    </ul>
@endsection