@extends('taken.taakDefault')

<!-- Page Title -->
@section('title')
    {{"Taken"}}
@endsection

<!-- Content -->
@section('content')
<section class="takenlijst">
    <a href="/taken/create"><button class="content--button__actions__primary">Nieuwe taak toevoegen</button></a>
    {{-- Een Succes message als de taak is opgeslagen --}}
    @if (session()->has('message'))
        <div class="taak__alert">
            <p>{{ session()->get('message') }}</p>
        </div>
    @endif
    <h1>Jouw taken</h1>
    @foreach ($taken as $taak)
        <article>

        <article>
    @endforeach
</section>
    <!-- <ul>
        {{-- Lijst met alle taken --}}
        @foreach ($taken as $taak)
        <li>Titel: {{$taak->title}}</li>
        <li>Omschrijving: {{$taak->omschrijving}}</li>
        <li>Status: {{$taak->status}}</li>
        @if ($taak->vak)
            <li>Vak: {{$taak->vak}}</li>
        @endif
        @if ($taak->prioriteit > 0)
            <li>Prioriteit: {{$taak->prioriteit}}</li>
        @endif
            <li>Deadline: {{$taak->deadline}}</li>
        @if ($taak->uitvoerdatum != $taak->deadline)
            <li>Uitvoerdatum: {{$taak->uitvoerdatum}}</li>
        @endif
        <a href="/taken/{{$taak->id}}/voltooi"><button>Voltooi Taak</button></a>
        <a href="/taken/{{$taak->id}}/edit"><button>Wijzig Taak</button></a>
        <hr>
        @endforeach
    </ul> -->
    {{-- Een button om een nieuwe taak toe te voegen --}}
@endsection
