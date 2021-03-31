
    @if(isset($nummer))
        <ul>
        </ul>
        <audio controls>
            <source src="/muziek/{{$nummer}}">
        </audio>
    @else
    <!-- zoek in de afspeellijst die de zelfde humeur heeft als de gebruiker naar een random nummer -->
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
