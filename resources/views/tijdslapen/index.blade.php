@extends('layouts.app')
    @section('title')
        {{"Grafiek van jouw bedtijd"}}
    @endsection
    @section('content')
        @include('tijdslapen.components.tijdslapenGrafiek--index')
    @endsection

