
    @if(isset($nummer))
        <ul>
        </ul>
        <audio controls>
            <source src="/muziek/{{$nummer}}">
        </audio>
        <!-- <div>{{$nummer}}</div> -->
    @else
            @foreach($afspeellijst as $afspeellijst) 
            @if($user->humeur == $afspeellijst->humeur)
                @foreach($afspeellijst->nummers->random(1) as $random )
                    <audio controls>
                        <source src="/muziek/{{$random->bestandLocatie }}">
                    </audio>
                @endforeach
            @endif
        @endforeach
    @endif
