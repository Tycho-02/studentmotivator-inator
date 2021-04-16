    <?php $__env->startSection('title'); ?>
        <?php echo e("Grafiek van jouw bedtijd"); ?>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('content'); ?>
        <?php echo $__env->make('tijdslapen.components.tijdslapenGrafiek--index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tych02/code/studentmotivator-inator/resources/views/tijdslapen/index.blade.php ENDPATH**/ ?>