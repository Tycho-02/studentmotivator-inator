<?php $__env->startSection('title'); ?>
    Upload
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <h2>Upload Nummer</h2>
    <form class='form' method="POST" action="toevoegen" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="afspeellijstId" value='1' >
        <label class="form__label" for="muziek">muziek</label>
        <input class='form__field' type="file" name="muziek">
        <label class="form__label" for="naam">naam</label>
        <input class='form__field' type="text" name="naam">
        <label class="form__label" for="artiest">artiest</label>
        <input class='form__field' type="text" name="artiest">
        <label class="form__label" for="genre">genre</label>
        <input class='form__field' type="text" name="genre">
        <label class="form__label" for="mood">Mood van het nummer</label>
        <select class='form__field section__select' id="mood" name="mood">
            <option value="1">Blokken</option>
            <option value="2">Stress</option>
            <option value="3">Pauze</option>
        </select>
        <button class="content--button__actions__primary" type="submit">Upload</button>
    </form>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pi/studentmotivator-inator/resources/views/nummers/upload.blade.php ENDPATH**/ ?>