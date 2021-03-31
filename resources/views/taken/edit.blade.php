@extends('taken.taakDefault')

<!-- Page Title -->
@section('title')
    {{"Taak Toevoegen"}}
@endsection

<!-- Content -->
@section('content')
    <h1 class="taken__add__header">Taak Toevoegen:</h1>
    <form class="taken__add__form" method='POST' action="/taken/{{$taak->id}}">
        @csrf
        @method('PUT')
            <label class="form__label" for="title">Taak</label>
            <input value="{{$taak->title}}" class="form__field" type="text" name="title" placeholder="Nieuw taak" required/>

            <label class="form__label" for="omschrijving">Omschrijving</label>
            <textarea class="form__field" name="omschrijving" rows="5" placeholder="Taak omschrijving....">{{$taak->omschrijving}}</textarea>

            <label class="form__label" for="label">Label</label>
            <input value="{{$taak->label}}" class="form__field" type="text" name="label" placeholder="Label" />

            <label class="form__label" for="prioriteit">Prioriteit (0-3)</label>
            <input class="form__field" type="number" name="prioriteit" min="0" max="3" value="{{$taak->prioriteit}}"/>

            <label class="form__label" for="deadline">Deadline</label>
            <input value="{{$taak->deadline}}" class="form__field" type="date" name="deadline" value="{{date('Y-m-d', time() + 86400)}}" min="{{date('Y-m-d')}}" />

            <label class="form__label" for="uitvoerdatum">Uitvoerdatum</label>
            <input value="{{$taak->uitvoerdatum}}" class="form__field" type="date" name="uitvoerdatum" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}" />

            <input class="content--button__actions__primary" type="submit" value="Taak wijzigen"/>

            {{-- Een Error message als een taak niet kon worden gewijzigd --}}
            @if (session()->has('message'))
                <div class="form__alert">
                    <p>{{ session()->get('message') }}</p>
                </div>
            @endif
    </form>
@endsection
