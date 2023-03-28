<?php

namespace App\Http\Controllers;

use App\Models\profile;
use App\Http\Requests\StoreprofileRequest;
use App\Http\Requests\UpdateprofileRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use File;

class ProfileController extends Controller
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
     * @param  \App\Http\Requests\StoreprofileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreprofileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user()->id;
        return view('pages.edit_user');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprofileRequest  $request
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $user = Auth::user()->id;
        $users->name = $request->name;
        if ($request->has('photo')) {
            if (File::exists($users->old_image)) {
                File::delete(public_path($users->old_image));
            }
            $image = $request->file('photo');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/photo');
            $image->move($destinationPath, $name);
            $users->photo = 'uploads/photo/' . $name;
        }
        $users->save();
        return redirect()->route('home');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $users = User::find($id);
        $users->delete();
        return back();
    }
}
