<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<section class="tijdInstellingen">
    <h1 class="tijdInstellingen__header">Huidige dagelijkse bedtijd wijzigen</h2>
    <form action="/tijdinstellingen/<?php echo e($data['id']); ?>" class="tijdInstellingen__form" method="POST">
    <input type="hidden" name="id" value="<?php echo e($data['id']); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

        <section class="tijdInstellingen__form__section">
            <label for="tijdInBed">Tijd naar bed:</label>
            <input type="time" step="1" class="tijdInstellingen__naarBed__input form__field" name="tijdInBed" value="<?php echo e($data['tijdInBed']); ?>" id="tijdInBed">
        </section>
        <section class="tijdInstellingen__form__section">
            <label for="tijdUitBed">Tijd uit bed:</label>
            <input type="time" step="1" class="tijdInstellingen__uitBed__input form__field" name="tijdUitBed" value="<?php echo e($data['tijdUitBed']); ?>" id="tijdUitBed">
    </section>
    <section class="tijdInstellingen__form__section ">
        <label for="buzzer">Buzzer instellen:</label>
        <select class="tijdInstellingen__form__section__select" name="buzzer" id="buzzer">
            <option value="aan">Buzzer aan</option>
            <option value="uit">Buzzer uit</option>
        </select>
    </section>
    
    <section class="tijdInstellingen__form__section ">
        <label for="meldingen">Meldingen ontvangen van taken:</label>
        <select class="tijdInstellingen__form__section__select" name="meldingen" id="meldingen">
            <option value="aan">Meldingen aan</option>
            <option value="uit">Meldingen uit</option>
        </select>
    </section>


    <section class="tijdInstellingen__form__section">
        <div class="tijdInstellingen__actions">
            <button type="submit" class="content--button__actions__primary button__actions__primary--tijdInstellingen">Opslaan</button>
            <a href="/tijdinstellingen" class="content--button__actions__ghost button__actions__ghost--tijdInstellingen">Annuleren</a>
        </div>
    </section>
    </form>
</section>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tych02/code/studentmotivator-inator/resources/views/tijdinstellingen/components/tijdinstellingen--edit.blade.php ENDPATH**/ ?>