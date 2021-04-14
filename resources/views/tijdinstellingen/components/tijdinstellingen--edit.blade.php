@foreach($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach

<section class="tijdInstellingen">
    <h1 class="tijdInstellingen__header">Huidige dagelijkse bedtijd wijzigen</h2>
    <form action="/tijdinstellingen/{{$data['id']}}" class="tijdInstellingen__form" method="POST">
    <input type="hidden" name="id" value="{{ $data['id'] }}">
    @csrf
    @method('PUT')

        <section class="tijdInstellingen__form__section">
            <label for="tijdInBed">Tijd naar bed:</label>
            <input type="time" step="1" class="tijdInstellingen__naarBed__input form__field" name="tijdInBed" value="{{ $data['tijdInBed'] }}" id="tijdInBed">
        </section>
        <section class="tijdInstellingen__form__section">
            <label for="tijdUitBed">Tijd uit bed:</label>
            <input type="time" step="1" class="tijdInstellingen__uitBed__input form__field" name="tijdUitBed" value="{{ $data['tijdUitBed'] }}" id="tijdUitBed">
    </section>
    <section class="tijdInstellingen__form__section ">
        <label for="buzzer">Buzzer instellen:</label>
        <select class="tijdInstellingen__form__section__select" name="buzzer" id="buzzer">
            <option value="aan">Buzzer aan</option>
            <option value="uit">Buzzer uit</option>
        </select>
    </section>
    
    <section class="tijdInstellingen__form__section ">
        <label for="meldingen">Meldingen ontvangen van taken:</label>
        <select class="tijdInstellingen__form__section__select" name="meldingen" id="meldingen">
            <option value="aan">Meldingen aan</option>
            <option value="uit">Meldingen uit</option>
        </select>
    </section>


    <section class="tijdInstellingen__form__section">
        <div class="tijdInstellingen__actions">
            <button type="submit" class="content--button__actions__primary button__actions__primary--tijdInstellingen">Opslaan</button>
            <a href="/tijdinstellingen" class="content--button__actions__ghost button__actions__ghost--tijdInstellingen">Annuleren</a>
        </div>
    </section>
    </form>
</section>
@include('sweetalert::alert')