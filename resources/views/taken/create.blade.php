@extends('taken.taakDefault')

<!-- Page Title -->
@section('title')
    {{"Taak Toevoegen"}}
@endsection

<!-- Content -->
@section('content')
<button class="menu--button__action" onclick="window.location='/taken'" ><i class="fas fa-long-arrow-alt-left fa-2x"></i></button>
<section class="taken__add__section">
    <h2 class="taken__add__header">Taak Toevoegen</h2>
    <form class="taken__form" method='POST' action="/taken">
        @csrf
        @method('POST')
            <label class="taken__form__label" for="title">Taak</label>
            <input class="taken__form__field" type="text" name="title" placeholder="Nieuw taak" required/>

            <label class="taken__form__label" for="omschrijving">Omschrijving</label>
            <textarea class="taken__form__field" name="omschrijving" rows="5" placeholder="Taak omschrijving...."></textarea>

            <label class="taken__form__label" for="vak">Vak</label>
            <input class="taken__form__field" type="text" name="vak" placeholder="vak" required/>

            <label class="taken__form__label" for="prioriteit">Prioriteit (0-3)</label>
            <input class="taken__form__field" type="number" name="prioriteit" min="0" max="3" />

            <label class="taken__form__label" for="deadline">Deadline</label>
            <input class="taken__form__field" type="date" name="deadline" value="{{date('Y-m-d', time() + 86400)}}" min="{{date('Y-m-d')}}" />

            <label class="taken__form__label" for="uitvoerdatum">Uitvoerdatum</label>
            <input class="taken__form__field" type="date" name="uitvoerdatum" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}" />

            <input class="content--button__actions__primary" type="submit" value="Taak toevoegen"/>

            {{-- Een Error message als een taak niet kon worden opgeslagen --}}
            @if (session()->has('message'))
                <div class="taken__form__alert">
                    <p>{{ session()->get('message') }}</p>
                </div>
            @endif

    </form>
</section>
@endsection
