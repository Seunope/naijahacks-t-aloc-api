<?php

namespace App\Http\Controllers;

use App\Models\QuestionComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class CommentController extends Controller
{
    public function  commentOnQuestion(Request $request)
    {
        if(!Auth::check()){
            flash('Aw! You have to login to add comment')->warning();
            return back();
        }

        $input = $request->all();
        $input['comment_by'] =  getUserID();
        //test it message empty page was sent
        $validator = Validator::make($input, [
            'comment' => 'required|min:5',
        ]);

        if($validator->passes()) {
            //save data
            $input['comment'] = ucfirst($input['comment']);
            QuestionComment::create($input);
            flash('Comment saved');
            return back();
        } else {
            flash('Whoops! Add a comment before saving')->error();
            return back();
        }
    }
}
