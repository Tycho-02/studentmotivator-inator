@foreach ($hours as $key=>$hour)
    <p>{{$hour}} {{$temps[$key]}} {{$weerbericht[$key]}}</p>
@endforeach

@foreach ($planning as $plan)
    <p>{{$plan}}</p>
@endforeach