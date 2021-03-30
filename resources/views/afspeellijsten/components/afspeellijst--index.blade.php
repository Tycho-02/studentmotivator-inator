
@foreach($afspeellijsten as $afspeellijst)
<li class="list__item">
    <p>{{ $afspeellijst->naam }}</p>
    <p>{{ $afspeellijst->aantalNummers }}</p>
    <p>{{ $afspeellijst->humeur }}</p>
</li>
@endforeach