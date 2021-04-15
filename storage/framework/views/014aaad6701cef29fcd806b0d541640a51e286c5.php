<!-- Page Title -->
<?php $__env->startSection('title'); ?>
    <?php echo e("Taken"); ?>

<?php $__env->stopSection(); ?>

<!-- Content -->
<?php $__env->startSection('content'); ?>
    
    <?php if(session()->has('message')): ?>
        <div class="taak__alert">
            <p><?php echo e(session()->get('message')); ?></p>
        </div>
    <?php endif; ?>
    <h1>Taken:</h1>
    <ul>
        
        <?php $__currentLoopData = $taken; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <ul>
            <li>id: <?php echo e($taak->id); ?></li>
            <li>Titel: <?php echo e($taak->title); ?></li>
            <li>Omschrijving: <?php echo e($taak->omschrijving); ?></li>
            <li>Status: <?php echo e($taak->status); ?></li>
            <?php if($taak->vak): ?>
                <li>Vak: <?php echo e($taak->vak); ?></li>
            <?php endif; ?>
            <?php if($taak->prioriteit > 0): ?>
                <li>Prioriteit: <?php echo e($taak->prioriteit); ?></li>
            <?php endif; ?>
                <li>Deadline: <?php echo e($taak->deadline); ?></li>
            <?php if($taak->uitvoerdatum != $taak->deadline): ?>
                <li>Uitvoerdatum: <?php echo e($taak->uitvoerdatum); ?></li>
            <?php endif; ?>
            <a href="/taken/<?php echo e($taak->id); ?>/voltooi"><button>Voltooi Taak</button></a>
            <a href="/taken/<?php echo e($taak->id); ?>/edit"><button>Wijzig Taak</button></a>
        </ul>
        <hr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    
    <a href="/taken/create"><button class="content--button__actions__primary">Taak toevoegen</button></a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('taken.taakDefault', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pi/studentmotivator-inator/resources/views/taken/index.blade.php ENDPATH**/ ?>