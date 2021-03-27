<section class="timer">
    <header class="timer__header">
        <h1>Stel je timer in</h1>
    </header>
    <section class="timer__timeSection">
        <h2>{{$timer->tijd}}</h2>
    </section>
    <form class="timer__form form" action="/timer" method="post">
        {{ csrf_field()}}
        <label class="form__label" for="time" >Voer hier de gewenste tijd in:</label>
        <input class="timer__form-field form__field" type="time" name="tijd">
        <input class="timer__form-submitBtn content--button__actions__primary" type="submit" Value="Bevestigen">
    </form>
    <!-- <section class="timer__buttonsSection" action="/timer" method="post">
        {{ csrf_field()}}
        <button class="timer__button1 u-btn-style"  type="submit" name="submit" Value="30">30 min</button>
        <button class="timer__button2 u-btn-style">45 min</button>
        <button class="timer__button3 u-btn-style">1 uur</button>
        <button class="timer__button4 u-btn-style">1uur 15 min</button>
        <button class="timer__buttonGo">Start de tijd!</button>
    </section> -->
</section>