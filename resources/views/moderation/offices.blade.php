@extends('app')

@section('body')
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-3xl py-3 mb-3">Bonjour {{ Auth::user()->name }}</h1>

        <a class="py-2 px-4 rounded-md bg-blue-500 text-white" href="/moderation">Retour</a>

        @if (!empty($offices))
        <div class="bg-white p-8 mt-4 rounded-lg shadow-md">
            <h2 class="text-3xl py-3 mb-2">Modération des salles</h2>

            <ul class="divide-y divide-gray-300">
                @foreach ($offices as $office)
                <li class="py-2 flex items-center justify-between">
                    <div>
                        <span class="font-semibold">[{{ $office->user->name }}]</span> - {{ $office->name }}
                    </div>
                    <a class="ml-2 py-2 px-4 rounded-md bg-blue-500 text-white" href="/moderation/salle-{{ $office->id }}">Voir</a>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
@endsection



