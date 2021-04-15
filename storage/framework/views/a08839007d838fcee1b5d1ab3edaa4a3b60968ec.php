    <?php if(isset($bestandLocatie)): ?>
        <audio id="music" preload="true">
                <source src="/muziek/<?php echo e($nummer->bestandLocatie); ?>">
            </audio>
            <section id="audioplayer" class="muziekSpeler" >
                <section class="muziekSpeler--info">
                    <article class="muziekSpeler--info__text">
                        <p ><?php echo e($nummer->naam); ?></p>
                        <p class="ondertext"><?php echo e($nummer->artiest); ?></p>
                    </article>
                    <section class="muziekSpeler--buttons">
                        <i  id="backwardButton" class="fas fa-step-backward muziekSpeler--play__Button "></i>
                        <i  id="pButton" class="fas fa-play muziekSpeler--play__Button "></i>
                        <i  id="forwardButton" class="fas fa-step-forward muziekSpeler--play__Button "></i>
                    </section>

                </section>
                <div id="timeline" class="muziekSpeler--timeline" >
                    <div id="playhead" class="muziekSpeler--timeline__playhead" ></div>
                </div>
            </section>
    <?php else: ?>

    <!-- zoek in de afspeellijst die de zelfde humeur heeft als de gebruiker naar een random nummer -->
        <?php $__currentLoopData = $afspeellijst; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $afspeellijst): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <?php if($user->humeur == $afspeellijst->humeur): ?>
                <?php $__currentLoopData = $afspeellijst->nummers->random(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $random): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <audio id="music" preload="true">
                <source src="/muziek/<?php echo e($random->bestandLocatie); ?>">
            </audio>
            <section id="audioplayer" class="muziekSpeler" >
                <section class="muziekSpeler--info">
                    <article class="muziekSpeler--info__text">
                        <p ><?php echo e($random->naam); ?></p>
                        <p class="ondertext"><?php echo e($random->artiest); ?></p>
                    </article>
                    <section class="muziekSpeler--buttons">
                        <i  id="backwardButton" class="fas fa-step-backward muziekSpeler--play__Button "></i>
                        <i  id="pButton" class="fas fa-play muziekSpeler--play__Button "></i>
                        <i  id="forwardButton" class="fas fa-step-forward muziekSpeler--play__Button "></i>
                    </section>

                </section>
                <div id="timeline" class="muziekSpeler--timeline" >
                    <div id="playhead" class="muziekSpeler--timeline__playhead" ></div>
                </div>
            </section>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php /**PATH /home/pi/ipmedt5/studentmotivator-inator/resources/views/nummers/components/muziekSpeler--index.blade.php ENDPATH**/ ?>