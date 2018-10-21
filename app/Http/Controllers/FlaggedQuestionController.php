<?php

namespace App\Http\Controllers;

use App\Models\QuestionFlaggged;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class FlaggedQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = QuestionFlaggged::paginate(15);;
        $res = QuestionFlaggged::get();
        $data['flaggedQuestion'] = $res;
        return view('question_flagged', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('question_details');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function loadFlaggedQuestions(){
        $subjectArray = QuestionFlaggged::subjectArray();
        $counter = count($subjectArray);
        for($i =0; $i < $counter; $i++){
            $this->dummyQuestion($subjectArray[$i]);
        }

        return view('question_flagged');
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
                $data['exam_year'] = $data['examtype'];
                $data['question_id'] = $data['id'];
                $data['solution'] = "None for now";
                $data['question_number'] = rand(1,50);
                $option = (array) $data['option'];
                $data['option_a'] = $option['a'];
                $data['option_b'] = $option['b'];
                $data['option_c'] = $option['c'];
                $data['option_d'] = $option['d'];

                QuestionFlaggged::create($data);
            }


        } catch (\Exception $e) {
            //dd($e);
            //return "Something got broken. Refresh or Check internet connection"  ;
        }

    }
}
