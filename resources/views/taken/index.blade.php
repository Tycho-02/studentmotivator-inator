@extends('taken.taakDefault')

<!-- Page Title -->
@section('title')
    {{"Taken"}}
@endsection

<!-- Content -->
@section('content')
<button class="menu--button__action" onclick="window.location='/'" ><i class="fas fa-long-arrow-alt-left fa-2x"></i></button>
<section class="takenlijst">
    <button class="content--button__actions__primary" onclick="window.location='/taken/create'">Nieuwe taak toevoegen</button>
    {{-- Een Succes message als de taak is opgeslagen --}}
    @if (session()->has('message'))
        <div class="taak__alert">
            <p>{{ session()->get('message') }}</p>
        </div>
    @endif
    <h1>Jouw taken</h1>
    <hr class="takenlijst__lijn"/>
    @foreach ($taken as $taak)
        <article class="takenlijst__taak">
            <section class="taak__header">
                @if ($taak->status === "klaar")
                    <label class="takenlijst__checkbox">
                        <input type="checkbox" checked="checked" disabled>
                        <span class="u--checkmark"></span>
                    </label>
                @else
                <label class="takenlijst__checkbox">
                    <input type="checkbox" disabled>
                    <span class="u--checkmark"></span>
                </label>
                @endif
                <h2 class="taak__header__title">{{$taak->vak}} - {{$taak->title}}</h2>
            </section>
            <section class="taak__body">
                <p><b>Uitvoerdatum:</b> {{$taak->uitvoerdatum}}</p>
                <p><b>Deadline:</b> {{$taak->deadline}}</p>
                <p><b>Prioriteit:</b>
                    @if ($taak->prioriteit === 0)
                    {{"Laag"}}
                    @elseif ($taak->prioriteit === 1)
                    {{"Normaal"}}
                    @elseif ($taak->prioriteit === 2)
                    {{"Hoog"}}
                    @elseif ($taak->prioriteit === 3)
                    {{"Extreem Hoog"}}
                    @endif
                </p>
                @if ($taak->omschrijving)
                    <p><b>Omschrijving:</b></p>
                    <p>{{$taak->omschrijving}}</p>
                @endif
            </section>
            <section class="taak__buttons">
                <button class="content--button__actions__primary takenlijst--button--first" onclick="window.location='/taken/{{$taak->id}}/voltooi'">
                    @if ($taak->status === "niet voltooid")
                        {{"Voltooi Taak"}}
                    @else
                        {{"Markeer Onvoltooid"}}
                    @endif
                </button>
                <button class="content--button__actions__primary takenlijst--button--second" onclick="window.location='/taken/{{$taak->id}}/edit'">Wijzig Taak</button>
            </section>
        <article>
        <hr class="takenlijst__lijn"/>
    @endforeach
</section>
@endsection
