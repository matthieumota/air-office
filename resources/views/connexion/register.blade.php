@extends('app')
@section('body')

<div class="mx-auto my-10 text-center py-4 text-2xl bg-white rounded-xl max-w-lg m-auto">
<p>Créer un compte<p>
<form method="post" class="m-auto max-w-lg">
    <div class="flex flex-wrap -mx-3 mb-6">
        @csrf
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">prénom</label>
            <input type="text" name="name" placeholder="Nom" id="name">
        </div>
        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">Email</label>
            <input type="text" name="email" placeholder="Email" id="email">
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                Mot de passe
            </label>
            <input type="password" name="password" placeholder="Mot de passe" id="password">
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password_confirmation">
                Confirmez votre mot de passe
            </label>
            <input type="password" name="password_confirmation" placeholder="Confirmer votre mot de passe" id="password_confirmation">
        </div>
    </div>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Inscription<button>

</form>
</div>
@endsection