
    <!-- word gekeken of de variabelen bestaan zo niet dan word de else gedisplayed -->
    @if(isset($afspeellijstnummers, $nummer))
        <ul>
            {{$afspeellijstnummers}}
        </ul>
        <audio controls>
            <source src="/muziek/{{$nummer}}">
        </audio>
        
    @else
        <ul>
        </ul>
        <audio controls>
            <source src="/muziek/{{$afspeellijstnummer->bestandLocatie}}">
        </audio>   
    @endif
