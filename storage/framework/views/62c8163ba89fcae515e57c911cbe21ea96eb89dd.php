<!-- Page Title -->
<?php $__env->startSection('title'); ?>
    <?php echo e("Taak Toevoegen"); ?>

<?php $__env->stopSection(); ?>

<!-- Content -->
<?php $__env->startSection('content'); ?>
    <h1 class="taken__add__header">Taak Toevoegen:</h1>
    <form class="taken__add__form" method='POST' action="/taaktoevoegen">
        <?php echo csrf_field(); ?>
        <?php echo method_field('POST'); ?>
            <label class="form__label" for="title">Taak</label>
            <input class="form__field" type="text" name="title" placeholder="Nieuw taak" required/>
        
            <label class="form__label" for="omschrijving">Omschrijving</label>
            <textarea class="form__field" name="omschrijving" rows="5" placeholder="Taak omschrijving...."></textarea>
        
            <label class="form__label" for="label">Label</label>
            <input class="form__field" type="text" name="label" placeholder="Label" />
        
            <label class="form__label" for="deadline">Deadline</label>
            <input class="form__field" type="date" name="deadline" value="<?php echo e(date('Y-m-d', time() + 86400)); ?>" min="<?php echo e(date('Y-m-d')); ?>" />

            <label class="form__label" for="uitvoerdatum">Uitvoerdatu:</label>
            <input class="form__field" type="date" name="uitvoerdatum" value="<?php echo e(date('Y-m-d')); ?>" min="<?php echo e(date('Y-m-d')); ?>" />

            <input class="content--button__actions__primary" type="submit" value="Taak toevoegen"/>

    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('taken.taakDefault', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tych02/code/studentmotivator-inator/resources/views/taken/add.blade.php ENDPATH**/ ?>