
@extends('layouts.app')
@section('title')
    Upload
@endsection
@section('content')
@foreach($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
    <h2>Upload Nummer</h2>
    <form class='form' method="POST" action="toevoegen" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="afspeellijstId" value='1' >
        <label class="form__label" for="muziek">muziek</label>
        <input class='form__field' type="file" name="muziek">
        <label class="form__label" for="naam">naam</label>
        <input class='form__field' type="text" name="naam">
        <label class="form__label" for="artiest">artiest</label>
        <input class='form__field' type="text" name="artiest">
        <label class="form__label" for="genre">genre</label>
        <input class='form__field' type="text" name="genre">
        <label class="form__label" for="mood">Mood van het nummer</label>
        <select class='form__field section__select' id="mood" name="mood">
            <option value="1">Blokken</option>
            <option value="2">Stress</option>
            <option value="3">Pauze</option>
        </select>
        <button class="content--button__actions__primary" type="submit">Upload</button>
    </form>
    @include('sweetalert::alert')
@endsection

