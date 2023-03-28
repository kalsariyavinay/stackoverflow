<?php

namespace App\Http\Controllers;

use App\Models\tag;
use App\Http\Requests\StoretagRequest;
use App\Http\Requests\UpdatetagRequest;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = tag::all();
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = tag::all();
        return view('admin.tag.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tags = new tag();
        $tags->tag = $request->tag;
        $request->validate([
            'tag' => 'required',
        ]);
        $tags->save();
        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(tag $tag)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $tags = tag::find($id);
        return view('admin.tag.edit', compact('tags'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetagRequest  $request
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tags = tag::find($id);
        $tags->tag = $request->tag;
        $tags->save();
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(tag $tag)
    {
        //
    }
}
