<!-- Page Title -->
<?php $__env->startSection('title'); ?>
    <?php echo e("Taak Wijzigen"); ?>

<?php $__env->stopSection(); ?>

<!-- Content -->
<?php $__env->startSection('content'); ?>
<button class="menu--button__action" onclick="window.location='/taken'" ><i class="fas fa-long-arrow-alt-left fa-2x"></i></button>
<section class="taken__add__section">
    <h2 class="taken__add__header">Taak Wijzigen</h2>
    <form class="taken__form" method='POST' action="/taken/<?php echo e($taak->id); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
            <label class="taken__form__label" for="title">Taak</label>
            <input value="<?php echo e($taak->title); ?>" id="title" class="taken__form__field" type="text" name="title" required/>

            <label class="taken__form__label" for="omschrijving">Omschrijving</label>
            <textarea class="taken__form__field" id="omschrijving" name="omschrijving" rows="5"><?php echo e($taak->omschrijving); ?></textarea>

            <label class="taken__form__label" for="label">Vak</label>
            <input value="<?php echo e($taak->vak); ?>" id="label" class="taken__form__field" type="text" name="vak" required/>

            <label class="taken__form__label" for="prioriteit">Prioriteit (0-3)</label>
            <input class="taken__form__field" id="prioriteit" type="number" name="prioriteit" min="0" max="3" value="<?php echo e($taak->prioriteit); ?>"/>

            <label class="taken__form__label" for="deadline">Deadline</label>
            <input value="<?php echo e($taak->deadline); ?>" id="deadline" class="taken__form__field" type="date" name="deadline" min="<?php echo e(date('Y-m-d')); ?>" />

            <label class="taken__form__label" for="uitvoerdatum">Uitvoerdatum</label>
            <input value="<?php echo e($taak->uitvoerdatum); ?>" id="uitvoerdatum" class="taken__form__field" type="date" name="uitvoerdatum" min="<?php echo e(date('Y-m-d')); ?>" />

            <input class="content--button__actions__primary" type="submit" value="Taak wijzigen"/>

            
            <?php if(session()->has('message')): ?>
                <div class="taken__form__alert">
                    <p><?php echo e(session()->get('message')); ?></p>
                </div>
            <?php endif; ?>
    </form>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('taken.taakDefault', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tych02/code/studentmotivator-inator/resources/views/taken/edit.blade.php ENDPATH**/ ?>