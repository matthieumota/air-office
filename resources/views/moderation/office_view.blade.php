@extends('app')

@section('body')
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-3xl py-3 mb-3">Bonjour {{ Auth::user()->name }}</h1>

        <a class="py-2 px-4 rounded-md bg-blue-500 text-white" href="/moderation/salles">Retour aux salles</a>

        <div class="bg-white p-8 mt-4 rounded-lg shadow-md">
            <h2 class="text-3xl py-3 mb-2">Modération de la salle</h2>

            <h3>{{ $office->name }}</h3>

            <div class="mt-3">
                <a class="py-2 px-4 rounded-md bg-blue-500 text-white" href="/moderation/salle-{{$office->id}}/validate">Accepter</a>
                <a class="py-2 px-4 rounded-md bg-red-500 text-white" href="/moderation/salle-{{$office->id}}/delete">Supprimer</a>
            </div>
        </div>

    </div>
@endsection
