@extends('app')

@section('body')
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-3xl py-3 mb-3">Bonjour {{ Auth::user()->name }} - Modération</h1>

        <a class="py-2 px-4 rounded-md bg-blue-500 text-white" href="/moderation/salles">Salles</a>
    </div>
@endsection
