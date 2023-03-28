<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use File;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package = Package::all();
        return view('admin.package.index', compact('package'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePackageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package = new Package();
        $package->title = $request->title;
        $package->price = $request->price;
        $package->total_job_post = $request->total_job_post;
        if ($request->has('logo')) {
            $image = $request->file('logo');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/companylogo/');
            $image->move($destinationPath, $name);
            $package->logo = 'uploads/companylogo/' . $name;
        }
        $package->save();
        return redirect()->route('package.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::find($id);
        return view('admin.package.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePackageRequest  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $package = Package::find($id);
        $package->title = $request->title;
        $package->price = $request->price;
        $package->total_job_post = $request->total_job_post;
        if ($request->has('logo')) {
            $image = $request->file('logo');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/companylogo/');
            $image->move($destinationPath, $name);
            $package->logo = 'uploads/companylogo/' . $name;
        }
        $package->save();
        return redirect()->route('package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $package = Package::find($id);
        $package->delete();
        return back();
    }

    public function status_update($id, $status)
    {
        $package = Package::find($id);
        $package->is_published = $status;
        $package->save();
        return back();
    }
}
