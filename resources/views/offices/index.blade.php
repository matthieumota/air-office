<h1>Salut {{ Auth::user()->name }}</h1>
<ul>
    @foreach ($offices as $office)
    <li>{{ $office->name }}</li>
    @endforeach
</ul>
