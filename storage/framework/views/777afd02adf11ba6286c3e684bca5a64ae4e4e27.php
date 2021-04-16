<!-- Page Title -->
<?php $__env->startSection('title'); ?>
    <?php echo e("Taken"); ?>

<?php $__env->stopSection(); ?>

<!-- Content -->
<?php $__env->startSection('content'); ?>
<button class="menu--button__action" onclick="window.location='/'" ><i class="fas fa-long-arrow-alt-left fa-2x"></i></button>
<section class="takenlijst">
    <button class="content--button__actions__primary" onclick="window.location='/taken/create'">Nieuwe taak toevoegen</button>
    
    <?php if(session()->has('message')): ?>
        <div class="taak__alert">
            <p><?php echo e(session()->get('message')); ?></p>
        </div>
    <?php endif; ?>
    <h1>Jouw taken</h1>
    <hr class="takenlijst__lijn"/>
    <?php $__currentLoopData = $taken; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <article class="takenlijst__taak">
            <section class="taak__header">
                <?php if($taak->status === "klaar"): ?>
                    <label class="takenlijst__checkbox">
                        <input type="checkbox" checked="checked" disabled>
                        <span class="u--checkmark"></span>
                    </label>
                <?php else: ?>
                <label class="takenlijst__checkbox">
                    <input type="checkbox" disabled>
                    <span class="u--checkmark"></span>
                </label>
                <?php endif; ?>
                <h2 class="taak__header__title"><?php echo e($taak->vak); ?> - <?php echo e($taak->title); ?></h2>
            </section>
            <section class="taak__body">
                <p><b>Uitvoerdatum:</b> <?php echo e($taak->uitvoerdatum); ?></p>
                <p><b>Deadline:</b> <?php echo e($taak->deadline); ?></p>
                <p><b>Prioriteit:</b>
                    <?php if($taak->prioriteit === 0): ?>
                    <?php echo e("Laag"); ?>

                    <?php elseif($taak->prioriteit === 1): ?>
                    <?php echo e("Normaal"); ?>

                    <?php elseif($taak->prioriteit === 2): ?>
                    <?php echo e("Hoog"); ?>

                    <?php elseif($taak->prioriteit === 3): ?>
                    <?php echo e("Extreem Hoog"); ?>

                    <?php endif; ?>
                </p>
                <?php if($taak->omschrijving): ?>
                    <p><b>Omschrijving:</b></p>
                    <p><?php echo e($taak->omschrijving); ?></p>
                <?php endif; ?>
            </section>
            <section class="taak__buttons">
                <button class="content--button__actions__primary takenlijst--button--first" onclick="window.location='/taken/<?php echo e($taak->id); ?>/voltooi'">
                    <?php if($taak->status === "niet voltooid"): ?>
                        <?php echo e("Voltooi Taak"); ?>

                    <?php else: ?>
                        <?php echo e("Markeer Onvoltooid"); ?>

                    <?php endif; ?>
                </button>
                <button class="content--button__actions__primary takenlijst--button--second" onclick="window.location='/taken/<?php echo e($taak->id); ?>/edit'">Wijzig Taak</button>
            </section>
        <article>
        <hr class="takenlijst__lijn"/>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('taken.taakDefault', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tych02/code/studentmotivator-inator/resources/views/taken/index.blade.php ENDPATH**/ ?>