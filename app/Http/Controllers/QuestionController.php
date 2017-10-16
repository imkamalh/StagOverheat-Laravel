<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index(Request $request){
        //return DB::table('question')->get();

        //get ?search=search as request if exists, else empty string ("")
        $search = $request->query()?$request->query()['search']:"";

        //return result
        return DB::table('question')
        ->where('title','like', $search.'%')
        ->orWhere('description','like', $search.'%')
        ->get();
    }

    //GET ONE
    public function show($id){
    	//return response()-> json ("get question with id = ". $id);
        $question = DB::table('question')
            ->where('id',$id)
            ->first();
        return response()->json($question);
    }

    //POST
    public function store(Request $request){
    		$doc = $request->all(); // request passing dari QuestionStore
            DB::table('question')->insert($doc); //query buat post
    		//"result"=>"store question with object from POST data";
    	}

    //PUT
    public function update(Request $request, $id){
    	$doc = $request->all();
        DB::table('question')
                ->where('id', $id)
                ->update($doc);
        return response()->json("success");
    }

    //DELETE
    public function destroy($id){
    	return response()-> json ("delete question with id = ". $id);	
    }
}
