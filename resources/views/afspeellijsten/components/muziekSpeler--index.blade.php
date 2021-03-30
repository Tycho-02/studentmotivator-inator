
    @if(isset($afspeellijstnummers))
        <ul>
        </ul>
        <audio controls>
            <source src="/muziek/{{$afspeellijstnummer->bestandLocatie}}">
        </audio>
        <div>{{$afspeellijstnummer}}</div>
    @else
    <ul>
        </ul>
        <audio controls>
            <source src="/muziek/{{$afspeellijstnummer->bestandLocatie}}">
        </audio>
        <div>{{$afspeellijstnummer}}</div>
    @endif
