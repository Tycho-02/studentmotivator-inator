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
    <!-- zoek in de afspeellijst die de zelfde humeur heeft als de gebruiker naar een random nummer -->
        @foreach($afspeellijst as $afspeellijst) 
            @if($user->humeur == $afspeellijst->humeur)
                {{$afspeellijst->nummers}}
                @foreach($afspeellijst->nummers->random(1) as $random )
            <audio id="music" preload="true">
                <source src="/muziek/{{$random->bestandLocatie}}">
            </audio>
            <section id="audioplayer" class="muziekSpeler" >
                <section class="muziekSpeler--info">
                    <article class="muziekSpeler--info__text">
                        <p >{{$random->naam}}</p>
                        <p class="ondertext">{{$random->artiest}}</p>
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
                @endforeach
            @endif
        @endforeach
    @endif
