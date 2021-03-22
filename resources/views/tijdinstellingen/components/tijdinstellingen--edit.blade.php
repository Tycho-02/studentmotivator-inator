<h2>Wijzig hier je tijd</h2>

<form action="{{ route('tijdinstellingen.update') }}" method="POST">
     @csrf
    <input type="hidden" name="id" value="{{ $data['id'] }}">
    <input type="text" name="tijdInBed" value="{{ $data['tijdInBed'] }}" id="">
    <input type="text" name="tijdUitBed" value="{{ $data['tijdUitBed'] }}">
    <input type="submit" value="Verstuur">
</form>
