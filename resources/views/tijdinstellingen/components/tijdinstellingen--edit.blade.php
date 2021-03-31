@foreach($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach

<article class="content--tijdInstellingen">
<h2 class="content--tijdInstellingen__header">Huidige dagelijkse bedtijd wijzigen</h2>
    <form action="{{ route('tijdinstellingen.update') }}" class="content--tijdInstellingen__form" method="POST">
    <input type="hidden" name="id" value="{{ $data['id'] }}">
    @csrf

        <section class="content--tijdInstellingen__form__section">
            <label for="tijdInBed">Tijd Naar bed:</label>
            <input type="time" step="1" class="content--tijdInstellingen_naarBed__input form__field" name="tijdInBed" value="{{ $data['tijdInBed'] }}" id="tijdInBed">
        </section>
        <section class="content--tijdInstellingen__form__section">
            <label for="tijdUitBed">Tijd Uit bed:</label>
            <input type="time" step="1" class="content--tijdInstellingen_uitBed__input form__field" name="tijdUitBed" value="{{ $data['tijdUitBed'] }}" id="tijdUitBed">
    </section>
    <section class="content--tijdInstellingen__form__section ">
        <label for="buzzer">Buzzer instellen:</label>
        <select class="content--tijdInstellingen__form__section__select" name="buzzer" id="buzzer">
            <option value="aan">Buzzer aan</option>
            <option value="uit">Buzzer uit</option>
        </select>
    </section>

        <div class="content--tijdInstellingen__actions">
            <input type="submit" value="Opslaan" class="content--button__actions__primary">
            <a href="/tijdinstellingen" class="content--button__actions__ghost">Annuleren</a>
        </div>
    </form>
</article>
@include('sweetalert::alert')