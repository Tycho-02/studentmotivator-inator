<!-- Page Title -->
<?php $__env->startSection('title'); ?>
    <?php echo e("Taak Toevoegen"); ?>

<?php $__env->stopSection(); ?>

<!-- Content -->
<?php $__env->startSection('content'); ?>
<button class="menu--button__action" onclick="window.location='/taken'" ><i class="fas fa-long-arrow-alt-left fa-2x"></i></button>
<section class="taken__add__section">
    <h2 class="taken__add__header">Taak Toevoegen</h2>
    <form class="taken__form" method='POST' action="/taken">
        <?php echo csrf_field(); ?>
        <?php echo method_field('POST'); ?>
            <label class="taken__form__label" for="title">Taak</label>
            <input class="taken__form__field" type="text" name="title" placeholder="Nieuw taak" required/>

            <label class="taken__form__label" for="omschrijving">Omschrijving</label>
            <textarea class="taken__form__field" name="omschrijving" rows="5" placeholder="Taak omschrijving...."></textarea>

            <label class="taken__form__label" for="vak">Vak</label>
            <input class="taken__form__field" type="text" name="vak" placeholder="vak" required/>

            <label class="taken__form__label" for="prioriteit">Prioriteit (0-3)</label>
            <input class="taken__form__field" type="number" name="prioriteit" min="0" max="3" />

            <label class="taken__form__label" for="deadline">Deadline</label>
            <input class="taken__form__field" type="date" name="deadline" value="<?php echo e(date('Y-m-d', time() + 86400)); ?>" min="<?php echo e(date('Y-m-d')); ?>" />

            <label class="taken__form__label" for="uitvoerdatum">Uitvoerdatum</label>
            <input class="taken__form__field" type="date" name="uitvoerdatum" value="<?php echo e(date('Y-m-d')); ?>" min="<?php echo e(date('Y-m-d')); ?>" />

            <input class="content--button__actions__primary" type="submit" value="Taak toevoegen"/>

            
            <?php if(session()->has('message')): ?>
                <div class="taken__form__alert">
                    <p><?php echo e(session()->get('message')); ?></p>
                </div>
            <?php endif; ?>

    </form>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('taken.taakDefault', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tych02/code/studentmotivator-inator/resources/views/taken/create.blade.php ENDPATH**/ ?>