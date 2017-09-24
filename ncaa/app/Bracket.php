<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bracket extends Model
{
    protected $fillable = [
        'active', 'furthest_round'
    ];
}
