@if ($results->count() > 0)
    <ul>
        @foreach ($results as $result)
            <li>{{ $result->symbol }} - {{ $result->name }}</li>
        @endforeach
    </ul>

@else
    <p>No search results found.</p>
@endif