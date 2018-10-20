<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoteTracker extends Model
{
    protected $table = 'vote_tracker';

    protected $fillable = ['vote_id', 'vote_by','type'];
}
