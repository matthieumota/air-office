@extends('app')

@section('body')
<div class="max-w-4xl mx-auto px-4">
    @if ($reservations->isNotEmpty())
    <div class="mt-8 bg-white p-4 rounded-lg shadow">
        <h2 class="text-xl text-center mb-4 font-bold">Vos réservations</h2>

        <div class="divide-y">
            @foreach ($reservations as $reservation)
            <div class="py-3 text-center">
                <p>Début : {{ $reservation->start_at->isoFormat('dddd D MMMM YYYY') }}</p>
                <p>Fin : {{ $reservation->end_at->isoFormat('dddd D MMMM YYYY') }}</p>
                <span class="font-bold">
                    ({{ $reservation->end_at->diffInDays($reservation->start_at) + 1 }} jours)
                </span>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
