
@foreach($nummers as $nummer)
<li class="list__item">
    <p>{{ $nummer->naam }}</p>
    <p>{{ $nummer->artiest }}</p>
    <p>{{ $nummer->genre }}</p>
    <button class="list__item--button__play">
        <a href="{{ route('krijg-nummer',  ['bestandLocatie' => $nummer->bestandLocatie, 'object' => $nummer])}}">    <i class="list__item--button__play fas fa-play"></i></a>
    </button>

</li>
  
@endforeach