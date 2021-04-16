<?php if(isset($bestandLocatie)): ?>
        <audio id="js--muziek" preload="true" autoplay>
                <source id="js--muziek-audio" src="/muziek/<?php echo e($nummer->bestandLocatie); ?>">
            </audio>
            <section id="js--audioplayer" class="muziekSpeler" >
                <section class="muziekSpeler--info">
                    <article class="muziekSpeler--info__text">
                        <p id="js--nummerNaam"><?php echo e($nummer->naam); ?></p>
                        <p id="js--nummerArtiest" class="ondertext"><?php echo e($nummer->artiest); ?></p>
                    </article>
                    <section class="muziekSpeler--buttons">
                        <!-- functie voor volgend en vorig nummer in de playlist -->
                        <i  onclick="vorigNummer(<?php echo e($afspeellijst); ?>)" class="fas fa-step-backward muziekSpeler--play__Button "></i>
                        <i  id="js--pButton" class="fas fa-pause muziekSpeler--play__Button "></i>
                        <i  onclick="volgendNummer(<?php echo e($afspeellijst); ?>)"  class="fas fa-step-forward muziekSpeler--play__Button "></i>
                    </section>

                </section>
                <!-- tijdline voor de muziek -->
                <div id="js--timeline" class="muziekSpeler--timeline" >
                    <div id="js--playhead" class="muziekSpeler--timeline__playhead" ></div>
                </div>
            </section>
    <?php else: ?>
    <!-- zoekt naar een random nummer -->
            <audio id="js--muziek" preload="true" autoplay>
                <source id="js--muziek-audio" src="/muziek/<?php echo e($afspeellijstEersteNummer->bestandLocatie); ?>">
            </audio>
            <section id="js--audioplayer" class="muziekSpeler" >
                <section class="muziekSpeler--info">
                    <article class="muziekSpeler--info__text">
                        <p id='js--nummerNaam'><?php echo e($afspeellijstEersteNummer->naam); ?></p>
                        <p id="js--nummerArtiest" class="ondertext"><?php echo e($afspeellijstEersteNummer->artiest); ?></p>
                    </article>
                    <section class="muziekSpeler--buttons">
                        <i  id="js--vorigeNummerButton" onclick="vorigNummer(<?php echo e($afspeellijst); ?>)" class="fas fa-step-backward muziekSpeler--play__Button "></i>
                        <i  id="js--pButton" class="fas fa-pause muziekSpeler--play__Button "></i>
                        <i  id="js--volgendNummerButton" onclick="volgendNummer(<?php echo e($afspeellijst); ?>)" class="fas fa-step-forward muziekSpeler--play__Button "></i>
                    </section>
                </section>
                <div id="js--timeline" class="muziekSpeler--timeline" >
                    <div id="js--playhead" class="muziekSpeler--timeline__playhead" ></div>
                </div>
            </section>
    <?php endif; ?>
<?php /**PATH /home/pi/studentmotivator-inator-1/resources/views/nummers/components/muziekSpeler--index.blade.php ENDPATH**/ ?>