<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\jobpost;
use App\Models\Package;
use App\Models\User;
use App\Http\Requests\StorejobpostRequest;
use App\Http\Requests\UpdatejobpostRequest;
use Illuminate\Http\Request;
use Session;
use Redirect;

class JobpostController extends Controller
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
     * @param  \App\Http\Requests\StorejobpostRequest  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $jobs = new jobpost();
        $jobs->user_id = Auth::user()->id;
        $jobs->job_title = $request->job_title;
        $jobs->company_name = $request->company_name;
        $jobs->location = $request->location;
        $jobs->hrcontact = $request->hrcontact;
        $jobs->website = $request->website;
        if ($request->has('logo')) {
            $image = $request->file('logo');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/companylogo/');
            $image->move($destinationPath, $name);
            $jobs->logo = 'uploads/companylogo/' . $name;
        }
        

        $request->validate([
            'job_title' => 'required|max:255',
            'company_name' => 'required|max:255',
            'location' => 'required|max:500',
            

        ]);
        if (isset($request->is_featured) && $request->is_featured == "on") {
            $jobs->is_featured = 1;
            $user = User::find(Auth::user()->id);
            if ($user->balance > 4) {
                $prem = $user->balance - 5;
                $user->balance = $prem;
                $user->save();
                $jobs->save();
                Session::flash('message', 'Job Post Successfully');
                Session::flash('errormsg', 'success');
            } else {
                Session::flash('message', 'balance insufficient');
                Session::flash('errormsg', 'wrong');
                $package = Package::all();
                return view('package.package', compact('package'));
            }
        } else {
            $jobs->is_featured = 0;
            $user = User::find(Auth::user()->id);
            if ($user->balance > 0) {
                $prem = $user->balance - 1;
                $user->balance = $prem;
                $user->save();
                $jobs->save();
                Session::flash('message', 'Job Post Successfully');
                Session::flash('errormsg', 'success');
            } else {
                Session::flash('message', 'balance insufficient');
                Session::flash('errormsg', 'wrong');
                $package = Package::all();
                return view('package.package', compact('package'));
            }
        }

        return redirect()->route('hire');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jobpost  $jobpost
     * @return \Illuminate\Http\Response
     */
    public function show(jobpost $jobpost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jobpost  $jobpost
     * @return \Illuminate\Http\Response
     */
    public function edit(jobpost $jobpost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatejobpostRequest  $request
     * @param  \App\Models\jobpost  $jobpost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatejobpostRequest $request, jobpost $jobpost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jobpost  $jobpost
     * @return \Illuminate\Http\Response
     */
    public function destroy(jobpost $jobpost)
    {
        //
    }
}
