
    @if(isset($nummer))
        <ul>
        </ul>
        <audio controls>
            <source src="/muziek/{{$nummer}}">
        </audio>
        <div>{{$nummer}}</div>
    @else
    <p>hoi</p>
    @endif
