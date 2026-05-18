<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chicken extends Model
{
    protected $fillable = [
        'name',
        'breed',
        'origin',
        'lifespan',
        'image'
    ];
}
