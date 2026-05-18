<!DOCTYPE html>
<html>
<head>
    <title>View Chicken</title>
</head>
<body>

<h1>🐔 {{ $chicken->name }}</h1>

<p><strong>Breed:</strong> {{ $chicken->breed }}</p>
<p><strong>Origin:</strong> {{ $chicken->origin }}</p>
<p><strong>Lifespan:</strong> {{ $chicken->lifespan }} years</p>

{{-- IMAGE --}}
@if($chicken->image)
    <img src="{{ asset('images/'.$chicken->image) }}" width="250">
@else
    <p>No image available</p>
@endif

<br><br>

{{-- ACTION BUTTONS --}}
<a href="{{ route('chickens.edit', $chicken->id) }}">✏️ Edit</a>

<form method="POST" action="{{ route('chickens.destroy', $chicken->id) }}" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Delete this chicken?')">
        🗑 Delete
    </button>
</form>

<br><br>
<a href="{{ route('chickens.index') }}">⬅ Back to List</a>

</body>
</html>