<h1>Créer une salle</h1>

@if ($errors->any())
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif

<form method="post">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <button>Ajouter</button>
</form>
