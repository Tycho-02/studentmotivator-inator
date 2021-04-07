
@foreach($afspeellijsten as $afspeellijst)
<li class="list__item">
    <p>{{ $afspeellijst->naam }}</p>
    <p>{{ $afspeellijst->aantalNummers }}</p>
    <p>{{ $afspeellijst->humeur }}</p>
    @if($afspeellijst->aantalNummers > 0)
        <a href="/afspeellijst/{{$afspeellijst->afspeellijstId}}"><i class="fas fa-arrow-alt-circle-right fa-2x"></i></a>
    @endif
</li>
@endforeach