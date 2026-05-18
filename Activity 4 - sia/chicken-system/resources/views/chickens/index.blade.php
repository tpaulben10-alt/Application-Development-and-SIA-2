<!DOCTYPE html>
<html>
<head>
    <title>Chicken List</title>
</head>
<body>

<h1>🐔 Chicken List</h1>

{{-- SUCCESS MESSAGE --}}
@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

{{-- ADD BUTTON --}}
<a href="{{ route('chickens.create') }}">➕ Add Chicken</a>

<br><br>

{{-- SEARCH FORM --}}
<form method="GET" action="{{ route('chickens.index') }}">
    <input 
        type="text" 
        name="search" 
        placeholder="Search chicken..." 
        value="{{ request('search') }}"
    >
    <button type="submit">Search</button>
</form>

<br>

{{-- CHICKEN LIST --}}
@forelse($chickens as $chicken)
    <div style="border:1px solid black; margin:10px; padding:10px; width:300px;">
        
        <h3>{{ $chicken->name }}</h3>
        <p><strong>Breed:</strong> {{ $chicken->breed }}</p>
        <p><strong>Origin:</strong> {{ $chicken->origin }}</p>
        <p><strong>Lifespan:</strong> {{ $chicken->lifespan }} years</p>

        {{-- IMAGE --}}
        @if($chicken->image)
            <img src="{{ asset('images/'.$chicken->image) }}" width="150">
        @else
            <p>No image</p>
        @endif

        <br><br>

        {{-- ACTION BUTTONS --}}
        <a href="{{ route('chickens.show', $chicken->id) }}">🔍 View</a> |
        <a href="{{ route('chickens.edit', $chicken->id) }}">✏️ Edit</a>

        <br><br>

        {{-- DELETE FORM --}}
        <form method="POST" action="{{ route('chickens.destroy', $chicken->id) }}">
            @csrf
            @method('DELETE')

            <button type="submit" onclick="return confirm('Are you sure?')">
                🗑 Delete
            </button>
        </form>

    </div>

@empty
    <p>No chickens found.</p>
@endforelse

{{-- PAGINATION --}}
{{ $chickens->links() }}

</body>
</html>