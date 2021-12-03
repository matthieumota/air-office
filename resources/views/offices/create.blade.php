@extends('app')

@section('body')
<div class="max-w-4xl mx-auto px-4">
    <div class="mt-8 bg-white p-4 rounded-lg shadow">
        <h1 class="text-xl mb-4 font-bold">Créer une salle</h1>

        @if ($errors->any())
            <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-800 mb-2">{{ $error }}</li>
            @endforeach
            </ul>
        @endif

        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <input type="text" name="name" placeholder="Nom">
                <input type="text" name="price" placeholder="Prix">
            </div>
            <div class="mb-4">
                <input type="file" name="image">
            </div>
            <button class="py-2 px-4 rounded-md bg-blue-500 text-white">Ajouter</button>
        </form>
    </div>
</div>
@endsection
