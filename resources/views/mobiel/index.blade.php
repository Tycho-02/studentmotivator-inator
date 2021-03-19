extends('default')
@section('content')
    <section>
        <header>
            <h1>{{$mobiel->mobielId}}</h1>
        </header>
        <p>{{$mobiel->beschikbaar}}</p>
        <p>{{$mobiel->berichtsturen}}</p>
        <p>{{$mobiel->smiley}}</p>

    </section>
@endsection