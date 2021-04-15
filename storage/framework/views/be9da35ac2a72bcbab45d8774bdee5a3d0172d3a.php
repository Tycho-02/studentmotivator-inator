<section class="timer">
    <header class="timer__header">
        <h1>Stel je timer in</h1>
    </header>
    <section class="timer__timeSection">
        <h2><?php echo e($timer->tijd); ?></h2>
    </section>
    <form class="timer__form form" action="/timer" method="post">
        <?php echo e(csrf_field()); ?>

        <label class="timer__label form__label" for="time" >Voer hier de gewenste tijd in:</label>
        <input class="timer__form-field form__field" id="time" type="time" name="tijd">
        <button class="timer__form-submitBtn content--button__actions__primary" type="submit">Bevestigen</button>
    </form>
    <form class="timer__buttonsSection" action="/timer" method="post">
        <?php echo e(csrf_field()); ?>

        <input class="timer__button content--button__actions__primary" type="submit" name="30" value="30 min">
        <input class="timer__button content--button__actions__primary" type="submit" name="45" value="45 min">
        <input class="timer__button content--button__actions__primary" type="submit" name="60" value="1 uur">
        <input class="timer__button content--button__actions__primary" type="submit" name="75" value="1 uur 15 min">
    </form>
</section><?php /**PATH /home/pi/studentmotivator-inator-1/resources/views/timer/components/timer--index.blade.php ENDPATH**/ ?>