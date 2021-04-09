    @if(isset($bestandLocatie))
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
    <!-- zoekt naar een random nummer -->
        {{$afspeellijst[1]->bestandLocatie}}
            <audio id="music" preload="true" autoplay>
                <source src="/muziek/{{$afspeellijstEersteNummer->bestandLocatie}}">
            </audio>
            <section id="audioplayer" class="muziekSpeler" >
                <section class="muziekSpeler--info">
                    <article class="muziekSpeler--info__text">
                        <p >{{$afspeellijstEersteNummer->naam}}</p>
                        <p class="ondertext">{{$afspeellijstEersteNummer->artiest}}</p>
                    </article>
                    <section class="muziekSpeler--buttons">
                        <i  id="backwardButton" class="fas fa-step-backward muziekSpeler--play__Button "></i>
                        <i  id="pButton" class="fas fa-pause muziekSpeler--play__Button "></i>
                        <i  id="forwardButton" class="fas fa-step-forward muziekSpeler--play__Button "></i>
                    </section>
                </section>
                <div id="timeline" class="muziekSpeler--timeline" >
                    <div id="playhead" class="muziekSpeler--timeline__playhead" ></div>
                </div>
            </section>

        <!-- @foreach($afspeellijst as $nummer)
            <audio id="music" preload="true" autoplay>
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
                        <i  id="pButton" class="fas fa-pause muziekSpeler--play__Button "></i>
                        <i  id="forwardButton" class="fas fa-step-forward muziekSpeler--play__Button "></i>
                    </section>
                </section>
                <div id="timeline" class="muziekSpeler--timeline" >
                    <div id="playhead" class="muziekSpeler--timeline__playhead" ></div>
                </div>
            </section>
        @endforeach
        -->
    @endif
