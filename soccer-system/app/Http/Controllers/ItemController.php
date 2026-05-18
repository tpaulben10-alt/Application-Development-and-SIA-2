<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $players = [
        [
            'id' => 1,
            'name' => 'Lionel Messi',
            'position' => 'Forward',
            'club' => 'Inter Miami',
            'nationality' => 'Argentina'
        ],
        [
            'id' => 2,
            'name' => 'Cristiano Ronaldo',
            'position' => 'Forward',
            'club' => 'Al Nassr',
            'nationality' => 'Portugal'
        ],
        [
            'id' => 3,
            'name' => 'Kylian Mbappe',
            'position' => 'Forward',
            'club' => 'PSG',
            'nationality' => 'France'
        ],
        [
            'id' => 4,
            'name' => 'Kevin De Bruyne',
            'position' => 'Midfielder',
            'club' => 'Manchester City',
            'nationality' => 'Belgium'
        ],
        [
            'id' => 5,
            'name' => 'Virgil van Dijk',
            'position' => 'Defender',
            'club' => 'Liverpool',
            'nationality' => 'Netherlands'
        ]
    ];

    public function index()
    {
        return view('items.index', ['items' => $this->players]);
    }

    public function show($id)
    {
        $player = collect($this->players)->firstWhere('id', $id);

        if (!$player) {
            abort(404);
        }

        return view('items.show', ['item' => $player]);
    }
}