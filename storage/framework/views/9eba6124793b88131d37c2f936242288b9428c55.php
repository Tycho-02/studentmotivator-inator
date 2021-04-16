<section class="timer">
    <header class="timer__header">
        <h1>Stel je timer in</h1>
    </header>
    <section class="timer__timeSection">
    <!-- nu worden alleen de uren en minuten weergeven i.p.v. uren, minuten en secondes -->
        <h2>Gewenste tijd: <?php echo e(\Carbon\Carbon::createFromFormat('H:i:s',$timer->tijd)->format('H:i')); ?></h2>
    </section>
    <!-- hier kan de gebruiker zelf de tijd invullen -->
    <form class="timer__form form" action="/timer" method="post">
        <?php echo e(csrf_field()); ?>

        <label class="timer__label form__label" for="time" >Voer hier de gewenste tijd in:</label>
        <input class="timer__form-field form__field" id="time" type="time" name="tijd">
        <!-- als de gebruiker niks invuld maar wel op de button klikt, komt er een error message tevoorschijn -->
        <?php if(session()->has('message')): ?>
            <div class="timer__form-alert">
                <p><?php echo e(session()->get('message')); ?></p>
            </div>
        <?php endif; ?>
        <button class="timer__form-submitBtn content--button__actions__primary" type="submit">Bevestigen</button>
        
    </form>
    <!-- de overige 4 buttons hebben een vaste waarden. -->
    <form class="timer__buttonsSection" action="/timer" method="post">
        <?php echo e(csrf_field()); ?>

        <input class="timer__button content--button__actions__primary" type="submit" name="30" value="30 min">
        <input class="timer__button content--button__actions__primary" type="submit" name="45" value="45 min">
        <input class="timer__button content--button__actions__primary" type="submit" name="60" value="1 uur">
        <input class="timer__button content--button__actions__primary" type="submit" name="75" value="1 uur 15 min">
    </form>
    <!-- succes melding om de gebruiker te laten zien dat de tijd succesvol is aangepast. -->
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>
<?php /**PATH /home/pi/ipmedt5/studentmotivator-inator/resources/views/timer/components/timer--index.blade.php ENDPATH**/ ?>