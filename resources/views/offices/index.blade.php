@extends('app')
@section('body')


<div class="flex space-x-10 my-4 justify-end mr-10 flex-wrap">
    <a href="/connexion?u=1" class="mb-2 text-1xl bg-yellow-200 hover:bg-yellow-400 text-white font-bold py-1 px-2 rounded">Matthieu</a>
    <a href="/connexion?u=2" class="mb-2 text-1xl bg-yellow-200 hover:bg-yellow-400 text-white font-bold py-1 px-2 rounded">Fiorella</a>
    <a href="/connexion?u=3" class="mb-2 text-1xl bg-yellow-200 hover:bg-yellow-400 text-white font-bold py-1 px-2 rounded">Modérateur</a>
    <h1 class="text-1xl py-1">Bienvenue {{ Auth::user()->name }}</h1>
</div>
<div class="flex flex-col justify-items-center space-y-10">
    <h1 class="m-auto text-5xl xl:w-6/12 text-center">Nos salles</h1>
    <a href="/bureau/nouveau" class="m-auto text-center hover:bg-gray-400 hover:text-white text-2xl w-6/12 bg-white rounded-xl p-4">Créer une salle</a>
</div>
<div class="m-auto p-10 xl:w-7/12 md:w-7/12 sm:w-11/12 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1  xl:grid-cols-3  gap-5">
    @foreach ($offices as $office)
    <div class="bg-white rounded-xl p-4 shadow-xl mt-4 ">

        <div class="flex flex-col justify-center items-center ">
            <img src="https://media.karousell.com/media/photos/products/2021/4/16/kajang_3xxk3xxk3xxk22x70_4r3b__1618542693_a779ef2b_progressive.jpg" class="w-full h-40 rounded-lg" />
        </div>
        <a class="font-semibold text-lg mt-1 text-left" href="/bureau/{{ $office->id }}">
            {{ $office->name }}
        </a>
        <p class="font-semibold text-sm text-gray-400">Rue Nationale, Lille</p>
        <div class="flex my-2">
            <a href='/bureau/modifier/{{$office->id}}' class="mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Modifier</a>
            <form method="post" action="/bureau/{{$office->id}}">
                @csrf @method('delete')
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Supprimer</button>
            </form>
        </div>
    </div>
    @endforeach

</div>
@endsection