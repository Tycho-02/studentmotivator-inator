@extends('taken.taakDefault')

<!-- Page Title -->
@section('title')
    {{"Taak Toevoegen"}}
@endsection

<!-- Content -->
@section('content')
    <h1>Taak Toevoegen:</h1>
    <form method='POST' action="/taaktoevoegen">
        @csrf
        @method('POST')
        <div>
            <label for="title">Taak:</label>
            <input type="text" name="title" placeholder="Nieuw taak" required/>
        </div>
        <div>
            <label for="omschrijving">Omschrijving:</label>
            <textarea name="omschrijving" rows="5" placeholder="Taak omschrijving...."></textarea>
        </div>
        <div>
            <label for="label">Label:</label>
            <input type="text" name="label" placeholder="label" />
        </div>
        <div>
            <label for="deadline">Deadline:</label>
            <input type="date" name="deadline" value="{{date('Y-m-d', time() + 86400)}}" min="{{date('Y-m-d')}}" />
        </div>
        <div>
            <label for="uitvoerdatum">Uitvoerdatum:</label>
            <input type="date" name="uitvoerdatum" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}" />
        </div>
        <div>
            <input type="submit" value="Taak toevoegen"/>
        </div>

    </form>
@endsection