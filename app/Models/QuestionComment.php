<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionComment extends Model
{
    protected $table = 'question_comment';

    protected  $fillable = ['question_flag_id','comment','comment_by' ];


    public function  user()
    {
        return $this->belongsTo('App\User', 'comment_by','id');
    }
}


