
<?php $__currentLoopData = $nummers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nummer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li class="list__item">
    <p><?php echo e($nummer->naam); ?></p>
    <p><?php echo e($nummer->artiest); ?></p>
    <p><?php echo e($nummer->genre); ?></p>
    <button class="list__item--button__play">
        <a href="<?php echo e(route('krijg-nummer',  ['bestandLocatie' => $nummer->bestandLocatie, 'object' => $nummer])); ?>">    <i class="list__item--button__play fas fa-play"></i></a>
    </button>

</li>
  
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/tych02/code/studentmotivator-inator/resources/views/nummers/components/nummer--index.blade.php ENDPATH**/ ?>