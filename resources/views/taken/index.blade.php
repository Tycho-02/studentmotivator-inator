@extends('taken.taakDefault')

<!-- Page Title -->
@section('title')
    {{"Taken"}}
@endsection

<!-- Content -->
@section('content')
<button class="menu--button__action" onclick="window.location='/'" ><i class="fas fa-long-arrow-alt-left fa-2x"></i></button>
<section class="takenlijst">
    <a href="/taken/create"><button class="content--button__actions__primary">Nieuwe taak toevoegen</button></a>
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
                <h2 class="taak__header__title">{{$taak->title}}</h2>
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
                <a href="/taken/{{$taak->id}}/voltooi">
                    <button class="content--button__actions__primary takenlijst--button--first">
                        @if ($taak->status === "niet voltooid")
                            {{"Voltooi Taak"}}
                        @else
                            {{"Markeer Onvoltooid"}}
                        @endif
                    </button>
                </a>
                <a href="/taken/{{$taak->id}}/edit">
                    <button class="content--button__actions__primary takenlijst--button--second">Wijzig Taak</button>
                </a>
            </section>
        <article>
        <hr class="takenlijst__lijn"/>
    @endforeach
</section>
@endsection
