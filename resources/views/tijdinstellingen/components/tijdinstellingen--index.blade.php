@foreach ($tijd as $tijd1)

<h2> Huidige tijd naar bed: {{$tijd1->tijdInBed}}</h2>
<h3> Huidige tijd uit bed: {{$tijd1->tijdUitBed}}</h3>
<h3>Tijd nu: {{$timeStamp}}
@endforeach

@if($timeStamp > $tijd1->tijdUitBed) 
    <h2>Hallo!</h2>

@else
    <h2>Hoi!</h2>
@endif