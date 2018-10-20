<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'vote';

    protected  $fillable = ['question_flag_id','up_vote','down_vote' ];

}
