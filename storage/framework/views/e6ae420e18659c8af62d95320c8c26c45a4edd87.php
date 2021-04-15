
<?php $__currentLoopData = $afspeellijsten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $afspeellijst): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li class="list__item">
    <p><?php echo e($afspeellijst->naam); ?></p>
    <p><?php echo e($afspeellijst->aantalNummers); ?></p>
    <p><?php echo e($afspeellijst->humeur); ?></p>
    <?php if($afspeellijst->aantalNummers > 0): ?>
        <a href="/afspeellijst/<?php echo e($afspeellijst->afspeellijstId); ?>"><i class="fas fa-arrow-alt-circle-right fa-2x"></i></a>
    <?php endif; ?>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/tych02/code/studentmotivator-inator/resources/views/afspeellijsten/components/afspeellijst--index.blade.php ENDPATH**/ ?>