<?php $__env->startSection('title'); ?>
    Nummers
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="content__nummers">
    <h1>Nummers</h1>
    <a class="content--hyperlink__button" href="/nummerToevoegen">Voeg nummer toe</a>
    <ul class="list">
        <li class="list__item hidden">
            <h2>Nummer</h2>
            <h2>Artiest</h2>
            <h2>Genre</h2>
        </li>
        <?php echo $__env->make('nummers.components.nummer--index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </ul>
    <!-- dit is een onzichtbare div deze heb ik nodig om te kijken wat de timer is -->
    <!-- word gebruikt in main.js -->
    <div id="js--checkVoorPauze" onclick="pauze('<?php echo e($timer->tijd); ?>')"></div>
    <script src="/js/main.js" defer></script>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tych02/code/studentmotivator-inator/resources/views/nummers/nummers.blade.php ENDPATH**/ ?>