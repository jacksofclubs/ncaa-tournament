<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DraftUser extends Model
{
    protected $fillable = [
        'draft_id',
        'user_id'
    ];
}
