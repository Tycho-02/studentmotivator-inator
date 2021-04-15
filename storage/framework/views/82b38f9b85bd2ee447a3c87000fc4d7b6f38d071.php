<?php $__env->startSection('content'); ?>
    <h1>Nummers</h1>
    <a class="content--hyperlink__button" href="/nummerToevoegen">Voeg nummer toe</a>
    <ul class="list">
        <li class="list__item hidden">
            <h2>Nummer</h2>
            <h2>Artiest</h2>
            <h2>Genre</h2>
        </li>
        <?php echo $__env->make('nummers.components.nummer--index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </ul>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pi/ipmedt5/studentmotivator-inator/resources/views/nummers/nummers.blade.php ENDPATH**/ ?>