<?php

namespace App\Http\Controllers;

use AdvanceSearch\AdvanceSearchProvider\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        return view('search');
    }

    public function searchByFullText(Request $request){
        $input = $request->all();
        $s = new Search();
        $res = $s->search(
            "Models\QuestionFlagged" ,
            ['question'] ,
            $input['search']  ,
            ['id','question','subject','exam_type','exam_year'],
            ['id'  , 'asc'] ,
            true ,
            30
        );

        $data['searchResults'] =  $res;
//        dd($data);
        return view('search', $data);
    }

    public function searchOthers(Request $request)
    {
        $input = $request->all();
    }
}
