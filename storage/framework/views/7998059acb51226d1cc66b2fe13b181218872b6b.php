<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<article class="content--tijdInstellingen">
<h2 class="content--tijdInstellingen__header">Huidige dagelijkse bedtijd wijzigen</h2>
    <form action="<?php echo e(route('tijdinstellingen.update')); ?>" class="content--tijdInstellingen__form" method="POST">
    <input type="hidden" name="id" value="<?php echo e($data['id']); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

        <section class="content--tijdInstellingen__form__section">
            <label for="tijdInBed">Tijd naar bed:</label>
            <input type="time" step="1" class="content--tijdInstellingen_naarBed__input form__field" name="tijdInBed" value="<?php echo e($data['tijdInBed']); ?>" id="tijdInBed">
        </section>
        <section class="content--tijdInstellingen__form__section">
            <label for="tijdUitBed">Tijd uit bed:</label>
            <input type="time" step="1" class="content--tijdInstellingen_uitBed__input form__field" name="tijdUitBed" value="<?php echo e($data['tijdUitBed']); ?>" id="tijdUitBed">
    </section>
    <section class="content--tijdInstellingen__form__section ">
        <label for="buzzer">Buzzer instellen:</label>
        <select class="content--tijdInstellingen__form__section__select" name="buzzer" id="buzzer">
            <option value="aan">Buzzer aan</option>
            <option value="uit">Buzzer uit</option>
        </select>
    </section>
    
    <section class="content--tijdInstellingen__form__section ">
        <label for="meldingen">Meldingen ontvangen van taken:</label>
        <select class="content--tijdInstellingen__form__section__select" name="meldingen" id="meldingen">
            <option value="aan">Meldingen aan</option>
            <option value="uit">Meldingen uit</option>
        </select>
    </section>


    <section class="content--tijdInstellingen__form__section">
        <div class="content--tijdInstellingen__actions">
            <button type="submit" class="content--button__actions__primary">Opslaan</button>
            <a href="/tijdinstellingen" class="content--button__actions__ghost">Annuleren</a>
        </div>
    </section>
</label>

    </form>
</article>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pi/ipmedt5/studentmotivator-inator/resources/views/tijdinstellingen/components/tijdinstellingen--edit.blade.php ENDPATH**/ ?>