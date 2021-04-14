@extends('default')


<section class="iconshop">
    <h3 class="">Je hebt: {{ $studiebuddy->myUser->myPuntentelling->punten }} punten</h3>
    <div class="iconshop__formWrapper">
    <form action="/gekochteuiterlijkjes/koop" method="POST" class="iconshop__form">
        @csrf
        <img src="/img/snorlax_highres.png" alt="Snorlax image">
        <p class="iconshop__price">350 punten</p>
        
        <input type="hidden" name="userId" value="{{$studiebuddy->myUser->userId}}">
        <input type="hidden" name="skin" value="Snorlax">
        <input type="submit" @{{@if($studiebuddy->myUser->myPuntentelling->punten >= 350)}} value="Kopen" @elseif(!is_null($studiebuddy->myUser->gekochteuiterlijkjes->where('skin', "Snorlax")->first())) value="Deze heb je al" @else value="Niet genoeg punten" @endif class="iconshop__button" @{{@if($studiebuddy->myUser->myPuntentelling->punten <= 350 or !is_null($studiebuddy->myUser->gekochteuiterlijkjes->where('skin', "Snorlax")->first())) disabled @endif}}>
    </form>        
    <form action="/gekochteuiterlijkjes/koop" method="POST" class="iconshop__form">
        @csrf
        <img src="/img/charizard_highres.png" alt="Charizard image">
        <p class="iconshop__price">500 punten</p>
        
        <input type="hidden" name="userId" value="{{$studiebuddy->myUser->userId}}">
        <input type="hidden" name="skin" value="Charizard">
        <input type="submit" @{{@if($studiebuddy->myUser->myPuntentelling->punten >= 500)}} value="Kopen" @elseif(!is_null($studiebuddy->myUser->gekochteuiterlijkjes->where('skin', "Charizard")->first())) value="Deze heb je al" @else value="Niet genoeg punten" @endif class="iconshop__button" @{{@if($studiebuddy->myUser->myPuntentelling->punten <= 500 or !is_null($studiebuddy->myUser->gekochteuiterlijkjes->where('skin', "Charizard")->first())) disabled @endif}}>
    </form>
    </div>
</section>
