@extends('default')

@section('form')
    <h2>Toeg een nummer toe</h2>

    <form action="{{ route('nummerToevogen.store') }}" method="POST">
        @csrf
        <input type="text" name="nummer" value="" id="">
        <input type="text" name="artiest" value="">
        <input type="text" name="genre" value="">
        <input type="submit" value="Verstuur">
    </form>
@endsection('form')
