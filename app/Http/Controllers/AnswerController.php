<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function index(Request $request, $questionId){
    	return DB::table('answer')
    	->where('questionId', $questionId)
    	->get();
    }

    //POST
    public function store(Request $request, $questionId){
    	$doc = $request->all();
    	$doc['questionId'] = (int)$questionId; //deklarasi parameter ke integer
    	DB::table('answer')->insert($doc);
    	return response()->json('success'); //response alert sukses bentuk json
    }
}
