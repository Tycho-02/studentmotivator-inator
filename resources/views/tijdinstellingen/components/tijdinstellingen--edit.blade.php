
<article class="content--tijdInstellingen">
<h2 class="content--tijdInstellingen__header">Huidige dagelijkse tijd wijzigen</h2>
    <form action="{{ route('tijdinstellingen.update') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $data['id'] }}">
        <input type="text" class="content--tijdInstellingen_naarBed__input form__field" name="tijdInBed" value="{{ $data['tijdInBed'] }}" id="">
        <input type="text" class="content--tijdInstellingen_uitBed__input form__field" name="tijdUitBed" value="{{ $data['tijdUitBed'] }}">
        <div class="content--tijdInstellingen__actions">
        <input type="submit" value="Opslaan" class="content--button__actions__primary">
        <a href="/tijdinstellingen" class="content--button__actions__ghost">Annuleren</a>
    </form>
</article>
