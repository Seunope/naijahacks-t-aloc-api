<?php

namespace App\Http\Controllers;

use App\Models\QuestionComment;
use Illuminate\Http\Request;
use Validator;

class CommentController extends Controller
{
    public function  commentOnQuestion(Request $request)
    {
        $input = $request->all();
dd(getUserID());
        $input['comment_by'] =  getUserID;
        //test it message empty page was sent
        $validator = Validator::make($input, [
            'comment' => 'required',
        ]);

        if($validator->passes())
        {
            //save data
            QuestionComment::create($input);
            return back()->with('message', 'Yeah! You just post a discussion');
        }
        else
        {
            return back()->withInput()->with('message', 'Please fill all entry')
                ->withErrors($validator);
        }
    }
}
