
@foreach($nummers as $nummer)
<li class="list__item">
    <p>{{ $nummer->naam }}</p>
    <p>{{ $nummer->artiest }}</p>
    <p>{{ $nummer->genre }}</p>
    <button onclick="speelNummer({{$nummer}})" class="list__item--button__play">
           <i class="list__item--button__play fas fa-play"></i>
    </button>
</li>
@endforeach