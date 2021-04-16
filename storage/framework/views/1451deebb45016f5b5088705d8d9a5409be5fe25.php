    <?php $__env->startSection('title'); ?>
        <?php echo e("Slaaptijd"); ?>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('content'); ?>
        <?php echo $__env->make('tijdinstellingen.components.tijdinstellingen--index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tych02/code/studentmotivator-inator/resources/views/tijdinstellingen/index.blade.php ENDPATH**/ ?>