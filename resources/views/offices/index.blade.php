<h1>Salut {{ Auth::user()->name }}</h1>
<a href="/connexion?u=1">Matthieu</a>
<a href="/connexion?u=2">Fiorella</a>
<a href="/connexion?u=3">Modérateur</a>
<a href="/bureau/nouveau">Créer une salle</a>
<a href="/moderation">Modération</a>
<ul>
    @foreach ($offices as $office)
    <li>
        <a href="/bureau/{{ $office->id }}">
            {{ $office->name }}
        </a>
        <a href='/bureau/modifier/{{$office->id}}'>Modifier</a>
    </li>
    @endforeach
</ul>