<h1> Modifier une salle </h1>

<h2>Nom de la salle : </h2>
<p>{{$office->name}}</p>

<form method="post">
    @csrf
    <input type="text" name="name" placeholder="Name" value="{{$office->name}}">
    <button>Modifier</button>
</form>