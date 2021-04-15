<?php $__env->startSection('content'); ?>
    <h1>Afspeellijsten</h1>
    <ul class="list">
        <li class="list__item hidden">
            <h2>Naam</h2>
            <h2>Aantal Nummers</h2>
            <h2>Humeur</h2>
        </li>
        <?php echo $__env->make('afspeellijsten.components.afspeellijst--index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </ul>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tych02/code/studentmotivator-inator/resources/views/afspeellijsten/afspeellijsten.blade.php ENDPATH**/ ?>