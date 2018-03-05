<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BracketMapping extends Model
{
    protected $table = 'bracket_mapping';
    protected $fillable = [
        'bracket_id',
        'user_id',
        'team_id',
        'region',
        'seed',
    ];
}
