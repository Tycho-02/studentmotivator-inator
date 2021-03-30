@extends('layouts.app')
@section('content')
    @foreach($afspeellijstnummers as $afspeellijstnummer)
    <h1>{{ $afspeellijst }}</h1>
    <li class="list__item">
        <p>{{ $afspeellijstnummer->naam }}</p>
        <p>{{ $afspeellijstnummer->artiest }}</p>
        <p>{{ $afspeellijstnummer->genre }}</p>
    <button>
        <a href="{{ route('afspeellijstNummer',  ['nummer' => $afspeellijstnummer->bestandLocatie, 'afspeellijstId' => $afspeellijstId])}}">play</a>
    </button>
    </li>   
    @endforeach
@endsection

