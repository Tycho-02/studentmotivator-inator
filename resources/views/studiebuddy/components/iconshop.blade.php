@section('title')
Icoon Shop
@endsection

@extends('default')

@section('content')
<section class="iconshop">
    <h3>Je hebt: {{ $user->punten }} punten</h3>
    <div class="iconshop__formWrapper">
    <form action="/gekochteuiterlijkjes/kopen" method="POST" class="iconshop__form">
        @csrf
        <img src="/img/snorlax_highres.png" alt="Snorlax image">
        <p class="iconshop__price">50 punten</p>
        <input type="hidden" value="{{$user->userId}}">
        <input type="hidden" value="Snorlax">
        <input type="submit" value="Kopen" class="iconshop__button">
    </form>
    <form action="/gekochteuiterlijkjes/kopen" method="POST" class="iconshop__form">
        @csrf
        <img src="/img/charizard_highres.png" alt="Charizard image">
        <p class="iconshop__price">50 punten</p>
        <input type="hidden" value="{{$user->userId}}">
        <input type="hidden" value="Charizard">
        <input type="submit" value="Kopen" class="iconshop__button">
    </form>
    </div>
</section>
@endsection