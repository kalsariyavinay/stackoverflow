<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Session;
use Mail;
use Auth;
class ContactController extends Controller
{

    public function index()
    {
        $contactus = Contact::orderBy('created_at', 'asc')->get();
        return view('admin.contact.index', compact('contactus'));
        // $contacts = Contact::all();
        // return view('admin.contact.index', compact('contacts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $contacts = new ContactUs();
        $contacts->user_id = Auth::user()->id;
        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->phone_number = $request->phone_number;
        $contacts->msg_subject = $request->msg_subject;
        $contacts->message = $request->message;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:255',
            'phone_number' => 'required',
            'msg_subject' => 'required',
            'message' => 'required',

        ]);
       
        $contacts->save();
        Session::flash('message', 'successfully');
        Session::flash('errormsg', 'success');
        
        return redirect()->route('home');
    }


    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contactus = Contact::find($id);
        return view('admin.contact.edit', compact('contactus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contacts = Contact::find($id);
        $contacts->call = $request->call;
        $contacts->email = $request->email;
        $contacts->address = $request->address;
        $contacts->save();
        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}