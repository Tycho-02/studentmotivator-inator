<?php $__env->startSection('content'); ?>
    <h1><?php echo e($afspeellijst); ?></h1>
    <li class="list__item hidden">
            <h2>Naam</h2>
            <h2>Artiest</h2>
            <h2>genre</h2>
    </li>
    <?php $__currentLoopData = $afspeellijstnummers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $afspeellijstnummer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="list__item">
        <p><?php echo e($afspeellijstnummer->naam); ?></p>
        <p><?php echo e($afspeellijstnummer->artiest); ?></p>
        <p><?php echo e($afspeellijstnummer->genre); ?></p>
    <button class="list__item--button__play">
        <a href="<?php echo e(route('afspeellijstNummer',  ['nummer' => $afspeellijstnummer->bestandLocatie, 'afspeellijstId' => $afspeellijstId])); ?>"><i class=" fas fa-play"></i></a>
    </button>
    </li>   
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tych02/code/studentmotivator-inator/resources/views/afspeellijsten/afspeellijstNummers.blade.php ENDPATH**/ ?>