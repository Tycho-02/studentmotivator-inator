    <?php $__env->startSection('title'); ?>
        <?php echo e("Bedtijd wijzigen"); ?>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('content'); ?>
        <?php echo $__env->make('tijdinstellingen.components.tijdinstellingen--edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pi/studentmotivator-inator/resources/views/tijdinstellingen/edit.blade.php ENDPATH**/ ?>