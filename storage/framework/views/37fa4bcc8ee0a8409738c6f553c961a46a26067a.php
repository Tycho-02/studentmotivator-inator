
<?php $__currentLoopData = $nummers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nummer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li class="list__item">
    <p><?php echo e($nummer->naam); ?></p>
    <p><?php echo e($nummer->artiest); ?></p>
    <p><?php echo e($nummer->genre); ?></p>
    <button onclick="speelNummer(<?php echo e($nummer); ?>)" class="list__item--button__play">
           <i class="list__item--button__play fas fa-play"></i>
    </button>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/pi/studentmotivator-inator/resources/views/nummers/components/nummer--index.blade.php ENDPATH**/ ?>