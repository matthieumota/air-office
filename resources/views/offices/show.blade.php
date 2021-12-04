@extends('app')

@section('body')
<div class="max-w-4xl mx-auto px-4">
    <h1 class="text-3xl py-3 my-4">{{ $office->name }}</h1>

    @if ($office->images->isNotEmpty())
    <div class="md:flex">
        <div class="md:w-2/3 mb-2 md:mb-0 md:mr-2">
            <img class="h-full" src="{{ asset('storage/'.$office->images->first()->path) }}">
        </div>
        <div class="md:w-1/3">
            @foreach ($office->images->slice(1) as $image)
            <img class="mb-2" src="{{ asset('storage/'.$image->path) }}">
            @endforeach
        </div>
    </div>
    @endif

    <div class="mt-8 bg-white p-4 rounded-lg shadow">
        <div class="flex justify-between items-center">
            <h2 class="text-xl mb-4 font-bold">Réserver la salle</h2>
            <p class="my-4">
                <span class="text-xl px-4 py-2 bg-green-300 text-green-900 font-bold rounded-xl">
                    {{ $office->price }} € / la journée
                </span>
            </p>
        </div>

        @if ($errors->any())
            <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-800 mb-2">{{ $error }}</li>
            @endforeach
            </ul>
        @endif

        <form method="post" action="/reservation/{{ $office->id }}">
            @csrf

            <div class="flex space-x-4">
                <div class="mb-4">
                    <label for="start_at">A partir du</label>
                    <input id="start_at" type="date" name="start_at" value="{{ old('start_at') }}">
                </div>
    
                <div class="mb-4">
                    <label for="end_at">Jusqu'au</label>
                    <input id="end_at" type="date" name="end_at" value="{{ old('end_at') }}">
                </div>
            </div>

            <div class="text-right">
                <button class="bg-blue-500 hover:bg-blue-600 px-4 py-2 text-white rounded-lg focus:ring-2">
                    Réserver
                </button>
            </div>
        </form>
    </div>

    @if ($office->reservations->isNotEmpty())
    <div class="mt-8 bg-white p-4 rounded-lg shadow">
        <h2 class="text-xl text-center mb-4 font-bold">Réservations actuelles</h2>

        <div class="divide-y">
            @foreach ($office->reservations as $reservation)
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
