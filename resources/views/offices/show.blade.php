<h1>{{ $office->name }}</h1>

<h2>Réserver la salle</h2>
<form method="post">
    @csrf
    <input type="date" name="start_at">
    <input type="date" name="end_at">
    <button>Réserver</button>
</form>
