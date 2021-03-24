
@extends('layouts.app')

@section('content')
<h2>Upload Nummer</h2>
    <form method="POST" action="toevoegen">
        @csrf
        <input type="hidden" name="afspeellijstId" value='1' enctype="multipart/form-data">
        <input type="file" name="muziek">
        <input type="text" name="naam">
        <input type="text" name="artiest">
        <input type="text" name="genre">
        <button type="submit">Upload</button>
    </form>   

@endsection