
    <!-- word gekeken of de variabelen bestaan zo niet dan word de else gedisplayed -->
    <!-- @if(isset($afspeellijstnummers, $nummer))
        <audio id="music" preload="true">
                <source src="/muziek/{{$nummer->bestandLocatie}}">
            </audio>
            <section id="audioplayer" class="muziekSpeler" >
                <section class="muziekSpeler--info">
                    <article class="muziekSpeler--info__text">
                        <p >{{$nummer->naam}}</p>
                        <p class="ondertext">{{$nummer->artiest}}</p>
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
        
    @else
            <audio id="music" preload="true">
                <source src="/muziek/{{$afspeellijstnummer->bestandLocatie}}">
            </audio>
            <section id="audioplayer" class="muziekSpeler" >
                <section class="muziekSpeler--info">
                    <article class="muziekSpeler--info__text">
                        <p >{{$afspeellijstnummer->naam}}</p>
                        <p class="ondertext">{{$afspeellijstnummer->artiest}}</p>
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
    @endif -->
