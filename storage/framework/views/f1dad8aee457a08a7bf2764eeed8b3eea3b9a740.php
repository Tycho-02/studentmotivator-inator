<section class="iconshop">
    <h3 class="">Je hebt: <?php echo e($studiebuddy->myUser->myPuntentelling->punten); ?> punten</h3>
    <div class="iconshop__formWrapper">
    <form action="/gekochteuiterlijkjes/koop" method="POST" class="iconshop__form">
        <?php echo csrf_field(); ?>
        <img src="/img/snorlax_highres.png" alt="Snorlax image">
        <p class="iconshop__price">350 punten</p>
        
        <input type="hidden" name="userId" value="<?php echo e($studiebuddy->myUser->userId); ?>">
        <input type="hidden" name="skin" value="Snorlax">
        <input type="submit" {{<?php if($studiebuddy->myUser->myPuntentelling->punten >= 350): ?>}} value="Kopen" <?php elseif(!is_null($studiebuddy->myUser->gekochteuiterlijkjes->where('skin', "Snorlax")->first())): ?> value="Deze heb je al" <?php else: ?> value="Niet genoeg punten" <?php endif; ?> class="iconshop__button" {{<?php if($studiebuddy->myUser->myPuntentelling->punten < 350 or !is_null($studiebuddy->myUser->gekochteuiterlijkjes->where('skin', "Snorlax")->first())): ?> disabled <?php endif; ?>}}>
    </form>        
    <form action="/gekochteuiterlijkjes/koop" method="POST" class="iconshop__form">
        <?php echo csrf_field(); ?>
        <img src="/img/charizard_highres.png" alt="Charizard image">
        <p class="iconshop__price">500 punten</p>
        
        <input type="hidden" name="userId" value="<?php echo e($studiebuddy->myUser->userId); ?>">
        <input type="hidden" name="skin" value="Charizard">
        <input type="submit" {{<?php if($studiebuddy->myUser->myPuntentelling->punten >= 500): ?>}} value="Kopen" <?php elseif(!is_null($studiebuddy->myUser->gekochteuiterlijkjes->where('skin', "Charizard")->first())): ?> value="Deze heb je al" <?php else: ?> value="Niet genoeg punten" <?php endif; ?> class="iconshop__button" {{<?php if($studiebuddy->myUser->myPuntentelling->punten < 500 or !is_null($studiebuddy->myUser->gekochteuiterlijkjes->where('skin', "Charizard")->first())): ?> disabled <?php endif; ?>}}>
    </form>
    </div>
</section>

<?php echo $__env->make('default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tych02/code/studentmotivator-inator/resources/views/studiebuddy/components/iconshop.blade.php ENDPATH**/ ?>