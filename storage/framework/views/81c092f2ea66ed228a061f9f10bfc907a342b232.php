<?php $__env->startSection('title'); ?>
    <?php echo e("Studiebuddy instellingen"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="studiebuddySettings">
    <form action="/updatestudiebuddy" class="studiebuddySettingsForm" method="POST">
    <h1>Studiebuddy Instellingen</h1>
        <?php echo csrf_field(); ?>
        <?php echo method_field('POST'); ?>
            <section class="studiebuddySettingsForm__group">
                <label for="Naam">Naam</label>
                <input type="text" class="studiebuddySettingsForm__field" type="text" name="naam" value="<?php echo e($studiebuddy->naam); ?>" maxlength="10">
            </section>
            <section class="studiebuddySettingsForm__group">
                <h2 class="studiebuddySettingsForm_groupheader">Locatie</h2>
                <label for="Naam">Latitude</label>
                <input class="studiebuddySettingsForm__field" type="number" id="js--latitude" type="number" name="lat" value="<?php echo e($studiebuddy->lat); ?>">
                <label for="Naam">Longitude</label>
                <input class="studiebuddySettingsForm__field" type="number" id="js--longitude" type="number" name="long" value="<?php echo e($studiebuddy->long); ?>">
                <button class="studiebuddySettingsForm__field studiebuddySettingsForm__field--button" type="button" onclick="getLocation()">Locatie Ophalen</button>
            </section>
            <section class="studiebuddySettingsForm__group studiebuddySettingsForm__group--radio">
                <h2 class="studiebuddySettingsForm_groupheader">Icoontje selecteren</h2>
                <div class="studiebuddySettingsForm__radioWrapper">
                    <div class="studiebuddySettingsForm__radio">
                        <img class="form__icon" src="/img/ladybugicon.png" alt="">
                        <input type="radio" id="Ladybug" name="skin" value="Ladybug" <?php echo e(($studiebuddy->skin=="Ladybug")? "checked" : ""); ?>>
                    </div>
                    <div class="studiebuddySettingsForm__radio">
                        <img class="form__icon" src="/img/turtleicon.png" alt="">
                        <input type="radio" id="Turtle" name="skin" value="Turtle" <?php echo e(($studiebuddy->skin=="Turtle")? "checked" : ""); ?>>
                    </div>
                    <div class="studiebuddySettingsForm__radio">
                        <img class="form__icon" src="/img/lionicon.png" alt="">
                        <input type="radio" id="Lion" name="skin" value="Lion" <?php echo e(($studiebuddy->skin=="Lion")? "checked" : ""); ?>>
                    </div>
                </div>
                <div class="studiebuddySettingsForm__radioWrapper studiebuddySettingsForm__radioWrapper--center">
                    <?php if(!is_null($studiebuddy->myUser->gekochteuiterlijkjes->where('skin', "Snorlax")->first())): ?>
                    <div class="studiebuddySettingsForm__radio">
                        <img class="form__icon" src="/img/snorlaxicon.png" alt="">
                        <input type="radio" id="Snorlax" name="skin" value="Snorlax" <?php echo e(($studiebuddy->skin=="Snorlax")? "checked" : ""); ?>>
                    </div>
                    <?php endif; ?>
                    <?php if(!is_null($studiebuddy->myUser->gekochteuiterlijkjes->where('skin', "Charizard")->first())): ?>
                    <div class="studiebuddySettingsForm__radio">
                        <img class="form__icon" src="/img/charizardicon.png" alt="">
                        
                        <input type="radio" id="Charizard" name="skin" value="Charizard" <?php echo e(($studiebuddy->skin=="Charizard")? "checked" : ""); ?>>
                    </div>
                    <?php endif; ?>
                </div>
                
            </section>
            <section class="studiebuddySettingsForm__group">
                <label for="temp">Jouw ideale temperatuur</label>
                <div class="studiebuddySettingsForm__rangeHolder"><p>15&#8451;</p><input class="studiebuddySettingsForm__field" type="range" id="temp" name="temp" min="15" max="25" step="1" value="<?php echo e($studiebuddy->ideale_temp); ?>"><p>25&#8451;</p></div>
            </section>
            <section class="studiebuddySettingsForm__group">
                <label for="temp">Jouw ideale luchtvochtigheid</label>
                    <div class="studiebuddySettingsForm__rangeHolder"><p>10%</p><input class="studiebuddySettingsForm__field" type="range" id="luchtvochtigheid" name="luchtvochtigheid" min="10" max="90" step="5" value="<?php echo e($studiebuddy->ideale_luchtvochtigheid); ?>"><p>90%</p></div>
            </section>
            <section class="studiebuddySettingsForm__group">
                <input class="studiebuddySettingsForm__field studiebuddySettingsForm__field--button" type="submit">
            </section>
    </form>
    <?php echo $__env->make('studiebuddy.components.iconshop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
    
<?php $__env->stopSection(); ?><?php /**PATH /home/pi/studentmotivator-inator/resources/views/studiebuddy/components/studiebuddysettings.blade.php ENDPATH**/ ?>