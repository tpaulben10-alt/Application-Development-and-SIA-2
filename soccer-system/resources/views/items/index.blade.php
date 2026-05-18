@extends('layout')

@section('content')
    <h2>All Players</h2>

    @foreach ($items as $player)
        <div class="card">
            <h3>{{ $player['name'] }}</h3>
            <p>Position: {{ $player['position'] }}</p>
            <p>Club: {{ $player['club'] }}</p>

            <a href="/items/{{ $player['id'] }}">View Details</a>
        </div>
    @endforeach
@endsection