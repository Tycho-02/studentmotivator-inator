
    <!-- word gekeken of de variabelen bestaan zo niet dan word de else gedisplayed -->
    <!-- <?php if(isset($afspeellijstnummers, $nummer)): ?>
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
            <audio id="music" preload="true">
                <source src="/muziek/<?php echo e($afspeellijstnummer->bestandLocatie); ?>">
            </audio>
            <section id="audioplayer" class="muziekSpeler" >
                <section class="muziekSpeler--info">
                    <article class="muziekSpeler--info__text">
                        <p ><?php echo e($afspeellijstnummer->naam); ?></p>
                        <p class="ondertext"><?php echo e($afspeellijstnummer->artiest); ?></p>
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
    <?php endif; ?> -->
<?php /**PATH /home/pi/studentmotivator-inator-1/resources/views/afspeellijsten/components/muziekSpeler--index.blade.php ENDPATH**/ ?>