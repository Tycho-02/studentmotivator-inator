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
    <article class="content--tijdInstellingen__naarBed">
        <h2 class="content--tijdInstellingen_naarBed__header">Tijd naar bed:</h2>
        <div class="form__group field">
            <input type="text" disabled class="content--tijdInstellingen_naarBed__input form__field" value="{{ $tijd->tijdInBed }}">
        </div>
        </article> 
    <article class="content--tijdInstellingen__uitBed">
        <h2 class="content--tijdInstellingen_uitBed__header">Tijd uit bed:</h2>
        <div class="form__group field">
            <input type="text" disabled class="content--tijdInstellingen_uitBed__input form__field" value="{{ $tijd->tijdUitBed }}">
        </div>
        </article> 
    <div class="content--tijdInstellingen__actions">
        <a href="{{ url('tijdinstellingen/edit') }}" class="content--button__actions__primary"><span>Wijzigen</span></a>
    </div>
</article>