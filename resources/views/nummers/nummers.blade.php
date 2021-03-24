@extends('layouts.app')
@section('content')
    <h1>Nummers</h1>
    <ul class="list">
        @include('nummers.components.nummer--index')
    </ul>
@stop