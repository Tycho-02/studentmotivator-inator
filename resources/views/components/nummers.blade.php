@foreach($nummers as $nummer)
    <p>{{ $nummer->naam }}</p>
    <p>{{ $nummer->artiest }}</p>
    <p>{{ $nummer->genre }}</p>
@endforeach

