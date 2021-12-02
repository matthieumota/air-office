<h1>Moderation</h1>

@if (!empty($offices))
    <ul>
        @foreach ($offices as $office)
        <li>{{ $office->name }}</li> <a href="/moderation/salle-{{ $office->id }}">voir</a>
        @endforeach
    </ul>
@endif
