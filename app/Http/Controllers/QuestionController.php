<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;
use Auth;

class QuestionController extends Controller
{
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $questions = new Question();
        $questions->user_id = Auth::user()->id;
        $questions->title = $request->title;
        $questions->question = $request->question;
        $questions->description = $request->description;
        $request->validate([
            'title' => 'required',
            'question' => 'required',
            'description' => 'required',
        ]);

        $requestset = $request->all();
        $questions->tag = json_encode($requestset['tag']);
        $questions->save();
        return redirect()->route('home');
    }

    public function show(Question $questions)
    {
        //
    }


    public function edit(Question $questions)
    {
        //
    }


    public function update(Request $request)
    {
        //
    }


    public function destroy()
    {
        //
    }
}
