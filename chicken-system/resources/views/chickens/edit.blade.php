<!DOCTYPE html>
<html>
<head>
    <title>Edit Chicken</title>
</head>
<body>

<h1>✏️ Edit Chicken</h1>

{{-- VALIDATION ERRORS --}}
@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('chickens.update', $chicken->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Name:</label><br>
    <input type="text" name="name" value="{{ old('name', $chicken->name) }}"><br><br>

    <label>Breed:</label><br>
    <input type="text" name="breed" value="{{ old('breed', $chicken->breed) }}"><br><br>

    <label>Origin:</label><br>
    <input type="text" name="origin" value="{{ old('origin', $chicken->origin) }}"><br><br>

    <label>Lifespan:</label><br>
    <input type="number" name="lifespan" value="{{ old('lifespan', $chicken->lifespan) }}"><br><br>

    {{-- CURRENT IMAGE --}}
    @if($chicken->image)
        <p>Current Image:</p>
        <img src="{{ asset('images/'.$chicken->image) }}" width="150"><br><br>
    @endif

    {{-- OPTIONAL NEW IMAGE --}}
    <label>Change Image:</label><br>
    <input type="file" name="image"><br><br>

    <button type="submit">Update Chicken</button>
</form>

<br>
<a href="{{ route('chickens.index') }}">⬅ Back to List</a>

</body>
</html>