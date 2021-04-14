@foreach($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
@if(session('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
    </div> 
@endif
<article class="content--tijdInstellingen">
    <h2 class="content--tijdInstellingen__header">Huidige dagelijkse tijd</h2>
    <section class="content--tijdInstellingen__section">
        <article class="content--tijdInstellingen__naarBed">
            <h2 class="content--tijdInstellingen_naarBed__header">Tijd naar bed:</h2>
            <div class="form__group field">
                <input type="time" disabled  step="1" class="content--tijdInstellingen_naarBed__input form__field" value="{{ $tijd->tijdInBed }}">
            </div>
        </article> 
        <article class="content--tijdInstellingen__uitBed">
            <h2 class="content--tijdInstellingen_uitBed__header">Tijd uit bed:</h2>
            <div class="form__group field">
                <input type="time" disabled  step="1" class="content--tijdInstellingen_uitBed__input form__field" value="{{ $tijd->tijdUitBed }}">
            </div>
        </article> 
        <article class="content--tijdInstellingen__buzzer">
            <h2 class="content--tijdInstellingen__buzzer__header">Buzzer staat op dit moment: {{ $tijd->buzzer }}</h2>
            <p class="content--tijdInstellingen__buzzer__text"> Tip: Laat de buzzer aanstaan om je goed aan je bedtijd te houden.<p>
        </article>
          <article class="content--tijdInstellingen__meldingen">
            <h2 class="content--tijdInstellingen__meldingen__header">Meldingen van taken staan op dit moment: {{ $tijd->meldingen }}</h2>
        </article>

        <div class="content--tijdInstellingen__actions">
            <a href="{{ url('tijdinstellingen/edit') }}" class="content--button__actions__primary button__actions__primary--tijdInstellingen"><span>Wijzigen</span></a>
            <a href="{{ url('/slapen/grafiek') }}" class="content--button__actions__ghost button__actions__ghost--tijdInstellingen"><span>Grafiek bekijken</span></a>
        </div>
 

    </section>
</article>