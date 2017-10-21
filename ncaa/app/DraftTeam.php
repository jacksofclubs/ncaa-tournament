<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DraftTeam extends Model
{
    protected $fillable = [
        'draft_id',
        'team_id',
        'region',
        'seed'
    ];
}
