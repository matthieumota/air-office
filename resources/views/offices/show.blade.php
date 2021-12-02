<h1>{{ $office->name }}</h1>
<p>Tarif: {{ $office->price }} €</p>

<h2>Réservations actuelles:</h2>
@foreach ($office->reservations as $reservation)
<p>Début : {{ $reservation->start_at }}, Fin : {{ $reservation->end_at }}</p>
@endforeach

<h2>Réserver la salle</h2>

@if ($errors->any())
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif

<form method="post" action="/reservation/{{ $office->id }}">
    @csrf
    <input type="date" name="start_at" value="{{ old('start_at') }}">
    <input type="date" name="end_at" value="{{ old('end_at') }}">
    <button>Réserver</button>
</form>
