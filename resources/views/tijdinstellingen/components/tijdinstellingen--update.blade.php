@foreach($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
@include('sweetalert::alert')