@extends('layouts.app')
@section('content')
    <h1>{{ $afspeellijst }}</h1>
    <li class="list__item hidden">
            <h2>Naam</h2>
            <h2>Artiest</h2>
            <h2>genre</h2>
    </li>
    @foreach($afspeellijstnummers as $afspeellijstnummer)
    <li class="list__item">
        <p>{{ $afspeellijstnummer->naam }}</p>
        <p>{{ $afspeellijstnummer->artiest }}</p>
        <p>{{ $afspeellijstnummer->genre }}</p>
    <button class="list__item--button__play">
        <a href="{{ route('afspeellijstNummer',  ['nummer' => $afspeellijstnummer->bestandLocatie, 'afspeellijstId' => $afspeellijstId])}}"><i class=" fas fa-play"></i></a>
    </button>
    </li>   
    @endforeach
@endsection

