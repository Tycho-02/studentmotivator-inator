@foreach($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
@if(session('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
    </div> 
@endif
<section class="tijdInstellingen">
    <h1 class="tijdInstellingen__header">Huidige dagelijkse tijd</h1>
    <section class="tijdInstellingen__section">
        <article class="tijdInstellingen__naarBed">
            <h2 class="tijdInstellingen__naarBed__header">Tijd naar bed:</h2>
                <h3 class="tijdInstellingen__naarBed__text">{{ $tijd->tijdInBed }}</h3>
        </article> 
        <article class="tijdInstellingen__uitBed">
            <h2 class="tijdInstellingen__uitBed__header">Tijd uit bed:</h2>
                <h3 class="tijdInstellingen__uitBed__text">{{ $tijd->tijdUitBed }}</h3>
        </article> 
        <article class="tijdInstellingen__buzzer">
            <h2 class="tijdInstellingen__buzzer__header">Buzzer staat op dit moment: {{ $tijd->buzzer }}</h2>
            <p class="tijdInstellingen__buzzer__text"> Tip: Laat de buzzer aanstaan om je goed aan je bedtijd te houden.<p>
        </article>
          <article class="tijdInstellingen__meldingen">
            <h2 class="tijdInstellingen__meldingen__header">Meldingen van taken staan op dit moment: {{ $tijd->meldingen }}</h2>
        </article>

        <div class="tijdInstellingen__actions">
            <a href="{{ url('tijdinstellingen/edit/1') }}" class="content--button__actions__primary button__actions__primary--tijdInstellingen"><span>Wijzigen</span></a>
            <a href="{{ url('/slapen/grafiek') }}" class="content--button__actions__ghost button__actions__ghost--tijdInstellingen"><span>Grafiek bekijken</span></a>
        </div>
 

    </section>
</section>