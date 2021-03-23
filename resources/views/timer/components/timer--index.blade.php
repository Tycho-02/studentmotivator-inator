<section class="timer">
    <header class="timer__header">
        <h1 class="timer__heading">Stel je timer in</h1>
    </header>
    <section class="timer__timeSection">
        <p class="timer__time">{{$timer->tijd}}</p>
    </section>
    <form class="timer__form">
        <label class="timer__label" for="">Voer hier het aantal uren in:</label>
        <input class="timer__input" type="text">
        <label class="timer__label" for="">Voer hier het aantal minuten in:</label>
        <input class="timer__input" type="text">
        <input class="timer__buttonAdd" type="submit" Value="Bevestigen">
    </form>
    <section class="timer__buttonsSection">
        <button class="timer__button1 u-btn-style">30 min</button>
        <button class="timer__button2 u-btn-style">45 min</button>
        <button class="timer__button3 u-btn-style">1 uur</button>
        <button class="timer__button4 u-btn-style">1uur 15 min</button>
        <button class="timer__buttonGo u-btn-style">Start de tijd!</button>
    </section>
</section>