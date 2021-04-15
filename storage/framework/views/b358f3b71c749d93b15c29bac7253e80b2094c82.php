<?php $__env->startSection('content'); ?>
<h2>Upload Nummer</h2>
    <form method="POST" action="toevoegen">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="afspeellijstId" value='1' enctype="multipart/form-data">
        <input type="file" name="muziek">
        <input type="text" name="naam">
        <input type="text" name="artiest">
        <input type="text" name="genre">
        <button type="submit">Upload</button>
    </form>   

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pi/studentmotivator-inator/resources/views/components/upload.blade.php ENDPATH**/ ?>