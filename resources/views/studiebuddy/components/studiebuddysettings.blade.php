@section('title')
    {{"Studiebuddy instellingen"}}
@endsection

@section('content')
    <h1>Studiebuddy Instellingen</h1>
    <form action="/updatestudiebuddy" class="form">
        @csrf
        @method('POST')
            <section class="form__group">
                <label class="form__label" for="Naam">Naam</label>
                <input type="form__field" type="text" name="naam" placeholder="Huidige naam: {{$studiebuddy->naam}}">
            </section>
            <section class="form__group">
                <img src="" alt="">
                <input type="radio" id="Snorlax" name="skin" value="Snorlax">
                <input type="radio" id="Lion" name="skin" value="Lion">
                <input type="radio" id="other" name="skin" value="other">
            </section>
            <section class="form__group">

            
            </section>
            <section class="form__group">
                <input type="submit">
            </section>
    
    
    
    </form>
@endsection