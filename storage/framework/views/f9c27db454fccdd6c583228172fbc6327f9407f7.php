<?php $__env->startSection('title'); ?>
        <?php echo e("Timer instellen"); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('timer.components.timer--index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pi/studentmotivator-inator/resources/views/timer/index.blade.php ENDPATH**/ ?>