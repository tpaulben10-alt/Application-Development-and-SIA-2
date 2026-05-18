<!DOCTYPE html>
<html>
<head>
    <title>Add Chicken</title>
</head>
<body>

<h1>Add Chicken</h1>

{{-- DISPLAY VALIDATION ERRORS --}}
@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('chickens.store') }}" enctype="multipart/form-data">
    @csrf

    <label>Name:</label><br>
    <input type="text" name="name" value="{{ old('name') }}"><br><br>

    <label>Breed:</label><br>
    <input type="text" name="breed" value="{{ old('breed') }}"><br><br>

    <label>Origin:</label><br>
    <input type="text" name="origin" value="{{ old('origin') }}"><br><br>

    <label>Lifespan:</label><br>
    <input type="number" name="lifespan" value="{{ old('lifespan') }}"><br><br>

    <label>Image:</label><br>
    <input type="file" name="image"><br><br>

    <button type="submit">Save Chicken</button>
</form>

<br>
<a href="{{ route('chickens.index') }}">⬅ Back to List</a>

</body>
</html>