@extends('layout')

@section('content')
    <h2>{{ $item['name'] }}</h2>

    <p><strong>Position:</strong> {{ $item['position'] }}</p>
    <p><strong>Club:</strong> {{ $item['club'] }}</p>
    <p><strong>Nationality:</strong> {{ $item['nationality'] }}</p>

    <br>
    <a href="/items">⬅ Back to List</a>
@endsection