@section('title')
    {{"Studiebuddy instellingen"}}
@endsection

@section('content')
    <h1>Studiebuddy Instellingen</h1>
    <form action="/updatestudiebuddy" class="form">
        @csrf
        @method('POST')
            <section class="form__group">
                <label class="form__label" for="Naam">Naam</label>
                <input type="form__field" type="text" name="naam" value="{{$studiebuddy->naam}}" maxlength="10">
            </section>
            <section class="form__group">
                <label class="form__label" for="Naam">Latitude</label>
                <input type="form__field" id="js--latitude" type="number" name="lat" value="{{$studiebuddy->lat}}">
                <label class="form__label" for="Naam">Longitude</label>
                <input type="form__field" id="js--longitude" type="number" name="long" value="{{$studiebuddy->long}}">
                <button type="button" onclick="getLocation()">Locatie Ophalen</button>
            </section>
            <section class="form__group form__group--icons">
                <div class="form__iconselect">
                    <img class="form__icon" src="/img/snorlaxicon.png" alt="">
                    <input type="radio" id="Snorlax" name="skin" value="Snorlax" {{ ($studiebuddy->skin=="Snorlax")? "checked" : "" }}>
                </div>
                <div class="form__iconselect">
                    <img class="form__icon" src="/img/lionicon.png" alt="">
                    <input type="radio" id="Lion" name="skin" value="Lion" {{ ($studiebuddy->skin=="Lion")? "checked" : "" }}>
                </div>
                <div class="form__iconselect">
                    <img class="form__icon" src="/img/ladybugicon.png" alt="">
                    <input type="radio" id="Ladybug" name="skin" value="Ladybug" {{ ($studiebuddy->skin=="Ladybug")? "checked" : "" }}>
                </div>
                
            </section>
            <section class="form__group form__group--slider">
                <label for="temp" class="form__label">Temperatuur</label>
                    <div class="form__sliderholder"><p>15</p><input class="form__range" type="range" id="temp" name="temp" min="15" max="25" step="1" value="{{$studiebuddy->ideale_temp}}"><p>25</p></div>
                <label for="temp" class="form__label">Luchtvochtigheid</label>
                    <div class="form__sliderholder"><p>10</p><input class="form__range" type="range" id="luchtvochtigheid" name="luchtvochtigheid" min="10" max="90" step="5" value="{{$studiebuddy->ideale_luchtvochtigheid}}"><p>90</p></div>
            </section>
            <section class="form__group">
                <input type="submit">
            </section>
    
    
    
    </form>
@endsection