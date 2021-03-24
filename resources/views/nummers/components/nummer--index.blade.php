
@foreach($nummers as $nummer)
<li class="list__item">
    <p>{{ $nummer->naam }}</p>
    <p>{{ $nummer->artiest }}</p>
    <p>{{ $nummer->genre }}</p>
</li>
  
@endforeach