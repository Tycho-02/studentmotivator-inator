
@foreach($Afspeellijsten as $Afspeellijst)
<li class="list__item">
    <p>{{ $Afspeellijst->naam }}</p>
    <p>{{ $Afspeellijst->aantalNummers }}</p>
    <p>{{ $Afspeellijst->humeur }}</p>
</li>
@endforeach