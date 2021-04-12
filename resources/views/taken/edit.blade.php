@extends('taken.taakDefault')

<!-- Page Title -->
@section('title')
    {{"Taak Wijzigen"}}
@endsection

<!-- Content -->
@section('content')
<section class="taken__add__section">
    <h2 class="taken__add__header">Taak Wijzigen</h2>
    <form class="taken__form" method='POST' action="/taken/{{$taak->id}}">
        @csrf
        @method('PUT')
            <label class="taken__form__label" for="title">Taak</label>
            <input value="{{$taak->title}}" class="taken__form__field" type="text" name="title" placeholder="Nieuw taak" required/>

            <label class="taken__form__label" for="omschrijving">Omschrijving</label>
            <textarea class="taken__form__field" name="omschrijving" rows="5" placeholder="Taak omschrijving....">{{$taak->omschrijving}}</textarea>

            <label class="taken__form__label" for="label">Label</label>
            <input value="{{$taak->label}}" class="taken__form__field" type="text" name="label" placeholder="Label" />

            <label class="taken__form__label" for="prioriteit">Prioriteit (0-3)</label>
            <input class="taken__form__field" type="number" name="prioriteit" min="0" max="3" value="{{$taak->prioriteit}}"/>

            <label class="taken__form__label" for="deadline">Deadline</label>
            <input value="{{$taak->deadline}}" class="taken__form__field" type="date" name="deadline" value="{{date('Y-m-d', time() + 86400)}}" min="{{date('Y-m-d')}}" />

            <label class="taken__form__label" for="uitvoerdatum">Uitvoerdatum</label>
            <input value="{{$taak->uitvoerdatum}}" class="taken__form__field" type="date" name="uitvoerdatum" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}" />

            <input class="content--button__actions__primary" type="submit" value="Taak wijzigen"/>

            {{-- Een Error message als een taak niet kon worden gewijzigd --}}
            @if (session()->has('message'))
                <div class="taken__form__alert">
                    <p>{{ session()->get('message') }}</p>
                </div>
            @endif
    </form>
</section>
@endsection