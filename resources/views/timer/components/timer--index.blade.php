<section class="timer">
    <header class="timer__header">
        <h1>Stel je timer in</h1>
    </header>
    <section class="timer__timeSection">
        <h2>Gewenste tijd: {{\Carbon\Carbon::createFromFormat('H:i:s',$timer->tijd)->format('H:i')}}</h2>
    </section>
    <form class="timer__form form" action="/timer" method="post">
        {{ csrf_field()}}
        <label class="timer__label form__label" for="time" >Voer hier de gewenste tijd in:</label>
        <input class="timer__form-field form__field" id="time" type="time" name="tijd">
        @if (session()->has('message'))
            <div class="timer__form-alert">
                <p>{{ session()->get('message') }}</p>
            </div>
        @endif
        <button class="timer__form-submitBtn content--button__actions__primary" type="submit">Bevestigen</button>
        
    </form>
    <form class="timer__buttonsSection" action="/timer" method="post">
        {{ csrf_field()}}
        <input class="timer__button content--button__actions__primary" type="submit" name="30" value="30 min">
        <input class="timer__button content--button__actions__primary" type="submit" name="45" value="45 min">
        <input class="timer__button content--button__actions__primary" type="submit" name="60" value="1 uur">
        <input class="timer__button content--button__actions__primary" type="submit" name="75" value="1 uur 15 min">
    </form>
</section>
