<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DraftRegion extends Model
{
    protected $fillable = [
        'draft_id',
        'location',
        'region'
    ];
}
