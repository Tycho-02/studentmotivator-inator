@if(isset($bestandLocatie))
        <audio id="js--muziek" preload="true" autoplay>
                <source id="js--muziek-audio" src="/muziek/{{$nummer->bestandLocatie}}">
            </audio>
            <section id="js--audioplayer" class="muziekSpeler" >
                <section class="muziekSpeler--info">
                    <article class="muziekSpeler--info__text">
                        <p id="js--nummerNaam">{{$nummer->naam}}</p>
                        <p id="js--nummerArtiest" class="ondertext">{{$nummer->artiest}}</p>
                    </article>
                    <section class="muziekSpeler--buttons">
                        <!-- functie voor volgend en vorig nummer in de playlist -->
                        <i  onclick="vorigNummer({{$afspeellijst}})" class="fas fa-step-backward muziekSpeler--play__Button "></i>
                        <i  id="js--pButton" class="fas fa-pause muziekSpeler--play__Button "></i>
                        <i  onclick="volgendNummer({{$afspeellijst}})"  class="fas fa-step-forward muziekSpeler--play__Button "></i>
                    </section>

                </section>
                <!-- tijdline voor de muziek -->
                <div id="js--timeline" class="muziekSpeler--timeline" >
                    <div id="js--playhead" class="muziekSpeler--timeline__playhead" ></div>
                </div>
            </section>
    @else
    <!-- zoekt naar een random nummer -->
            <audio id="js--muziek" preload="true" autoplay>
                <source id="js--muziek-audio" src="/muziek/{{$afspeellijstEersteNummer->bestandLocatie}}">
            </audio>
            <section id="js--audioplayer" class="muziekSpeler" >
                <section class="muziekSpeler--info">
                    <article class="muziekSpeler--info__text">
                        <p id='js--nummerNaam'>{{$afspeellijstEersteNummer->naam}}</p>
                        <p id="js--nummerArtiest" class="ondertext">{{$afspeellijstEersteNummer->artiest}}</p>
                    </article>
                    <section class="muziekSpeler--buttons">
                        <i  id="js--vorigeNummerButton" onclick="vorigNummer({{$afspeellijst}})" class="fas fa-step-backward muziekSpeler--play__Button "></i>
                        <i  id="js--pButton" class="fas fa-pause muziekSpeler--play__Button "></i>
                        <i  id="js--volgendNummerButton" onclick="volgendNummer({{$afspeellijst}})" class="fas fa-step-forward muziekSpeler--play__Button "></i>
                    </section>
                </section>
                <div id="js--timeline" class="muziekSpeler--timeline" >
                    <div id="js--playhead" class="muziekSpeler--timeline__playhead" ></div>
                </div>
            </section>
    @endif
