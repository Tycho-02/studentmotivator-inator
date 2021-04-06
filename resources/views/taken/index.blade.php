@extends('taken.taakDefault')

<!-- Page Title -->
@section('title')
    {{"Taken"}}
@endsection

<!-- Content -->
@section('content')
    {{-- Een Succes message als de taak is opgeslagen --}}
    @if (session()->has('message'))
        <div class="taak__alert">
            <p>{{ session()->get('message') }}</p>
        </div>
    @endif
    <h1>Taken:</h1>
    <ul>
        {{-- Lijst met alle taken --}}
        @foreach ($taken as $taak)
        <ul>
            <li>Titel: {{$taak->title}}</li>
            <li>Omschrijving: {{$taak->omschrijving}}</li>
            <li>Status: {{$taak->status}}</li>
            @if ($taak->label)
                <li>Label: {{$taak->label}}</li>
            @endif
            @if ($taak->prioriteit > 0)
                <li>Prioriteit: {{$taak->prioriteit}}</li>
            @endif
                <li>Deadline: {{$taak->deadline}}</li>
            @if ($taak->uitvoerdatum != $taak->deadline)
                <li>Uitvoerdatum: {{$taak->uitvoerdatum}}</li>
            @endif
            <a href="/taken/{{$taak->id}}/destroy"><button>Voltooi Taak</button></a>
            <a href="/taken/{{$taak->id}}/edit"><button>Wijzig Taak</button></a>
        </ul>
        <hr>
        @endforeach
    </ul>
    {{-- Een button om een nieuwe taak toe te voegen --}}
    <a href="/taken/create"><button class="content--button__actions__primary">Taak toevoegen</button></a>
@endsection
