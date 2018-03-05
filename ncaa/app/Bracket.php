<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bracket extends Model
{
    protected $fillable = [
        'short_description',
        'long_description'
    ];
}
