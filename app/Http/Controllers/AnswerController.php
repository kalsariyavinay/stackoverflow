<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;
use App\Models\Answer;
use Auth;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


    public function store(Request $request)
    {
        $answers = new Answer();
        $answers->user_id = Auth::user()->id;
        $answers->question_id =  $request->question_id;
        $answers->answer = $request->answer;
        $answers->save();
        return back();
    }


    public function show(Answer $answer)
    {
        //
    }


    public function edit(Answer $answer)
    {
        //
    }


    public function update(UpdateAnswerRequest $request, Answer $answer)
    {
        //
    }


    public function destroy(Answer $answer)
    {
        //
    }
}
