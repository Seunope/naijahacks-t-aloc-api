<?php

namespace App\Http\Controllers;

use AdvanceSearch\AdvanceSearchProvider\Search;
use App\Models\QuestionComment;
use App\Models\QuestionFlagged;
use App\Models\Vote;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class FlaggedQuestionController extends Controller
{

    public function index()
    {
        $res = QuestionFlagged::inRandomOrder()->paginate(15);
        $data['flaggedQuestion'] = $res;
        return view('question_flagged', $data);

    }

    public function show($id)
    {
        $res =  QuestionFlagged::find($id);
        $voted = Vote::whereQuestion_flag_id($id)->first();
        $comment = QuestionComment::whereQuestion_flag_id($id)->get();
        $data['questionDetails'] = $res;
        $data['votes'] = $voted;
        $data['comments'] = $comment;

        return view('question_details', $data);
    }


    public function loadFlaggedQuestions(){
        $subjectArray = QuestionFlagged::subjectArray();
        $counter = count($subjectArray);
        for($i =0; $i < $counter; $i++){
            $this->dummyQuestion($subjectArray[$i]);
        }

        return redirect('/flagged');
    }

    public function dummyQuestion($subject){
        try{
            $client = new Client();
            $res = $client->request('GET', 'https://questions.aloc.ng/api/m?subject='.$subject);

            $response =  json_decode($res->getBody()->getContents());
            $returnData =   (array) $response->data;
            $counter = count($returnData);
            for ($i=0; $i < $counter; $i++) {
                $data =   (array)$returnData[$i];
                $data['exam_type'] = $data['examtype'];
                $data['exam_year'] = $data['examyear'];
                $data['question_id'] = $data['id'];
                $data['subject'] = $subject;
                $data['solution'] = "None for now";
                $data['question_number'] = rand(1,50);
                $option = (array) $data['option'];
                $data['option_a'] = $option['a'];
                $data['option_b'] = $option['b'];
                $data['option_c'] = $option['c'];
                $data['option_d'] = $option['d'];

                QuestionFlagged::create($data);
            }


        } catch (\Exception $e) {
//            dd($e);
            //return "Something got broken. Refresh or Check internet connection"  ;
        }

    }
}
