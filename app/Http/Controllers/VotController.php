<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use Illuminate\Http\Request;
use App\Models\Vot;
use Auth;
use Session;

class VotController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVotRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    public function up_vot_q($id)
    {
        $vosold = Vot::where('question_id', $id)->where('type', 1)->where('user_id', Auth::user()->id)->first();
        if ($vosold) {
            $vosold->status = 1;
            $vosold->save();
            Session::flash('message', 'Vot updated successfully');
            Session::flash('errormsg', 'success');
        } else {
            $vots = new Vot();
            $vots->user_id = Auth::user()->id;
            $vots->question_id = $id;
            $vots->status = 1;
            $vots->type = 1;
            $vots->save();
            Session::flash('message', 'Vot uped successfully');
            Session::flash('errormsg', 'success');
        }
        return redirect()->back();
    }

    public function down_vot_q($id)
    {
        $vosold = Vot::where('question_id', $id)->where('type', 1)->where('user_id', Auth::user()->id)->first();
        if ($vosold) {

            $vosold->status = 0;
            $vosold->save();
            Session::flash('message', 'Vot updated successfully');
            Session::flash('errormsg', 'success');
        } else {
            $vots = new Vot();
            $vots->user_id = Auth::user()->id;
            $vots->question_id = $id;
            $vots->status = 0;
            $vots->type = 1;
            $vots->save();
            Session::flash('message', 'Vot downed successfully');
            Session::flash('errormsg', 'success');
        }
        return redirect()->back();
    }



    public function up_vot_a($id, $a_id)
    {
        $vosold = Vot::where('question_id', $id)->where('answer_id', $a_id)->where('type', 0)->where('user_id', Auth::user()->id)->first();
        if ($vosold) {
            $vosold->status = 1;
            $vosold->save();
            Session::flash('message', 'Vot updated successfully');
            Session::flash('errormsg', 'success');
        } else {
            $vots = new Vot();
            $vots->user_id = Auth::user()->id;
            $vots->question_id = $id;
            $vots->answer_id = $a_id;
            $vots->status = 1;
            $vots->type = 0;
            $vots->save();
            Session::flash('message', 'Vot uped successfully');
            Session::flash('errormsg', 'success');
        }
        return redirect()->back();
    }

    public function down_vot_a($id, $a_id)
    {
        $vosold = Vot::where('question_id', $id)->where('answer_id', $a_id)->where('type', 0)->where('user_id', Auth::user()->id)->first();
        if ($vosold) {

            $vosold->status = 0;
            $vosold->save();
            Session::flash('message', 'Vot updated successfully');
            Session::flash('errormsg', 'success');
        } else {
            $vots = new Vot();
            $vots->user_id = Auth::user()->id;
            $vots->question_id = $id;
            $vots->answer_id = $a_id;
            $vots->status = 0;
            $vots->type = 0;
            $vots->save();
            Session::flash('message', 'Vot downed successfully');
            Session::flash('errormsg', 'success');
        }
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vot  $vot
     * @return \Illuminate\Http\Response
     */
    public function show(Vot $vot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vot  $vot
     * @return \Illuminate\Http\Response
     */
    public function edit(Vot $vot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVotRequest  $request
     * @param  \App\Models\Vot  $vot
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVotRequest $request, Vot $vot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vot  $vot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vot $vot)
    {
        //
    }
}
