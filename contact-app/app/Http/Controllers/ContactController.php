<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller{

    public function index()
    {
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        // DB::enableQueryLog();
        $contacts = Contact::latestFirst()->paginate(10);
        // dd(DB::getQueryLog());
        return view('contacts.index', compact('contacts', 'companies'));

        // Remove all of the global scopes
        // Contact::withoutGlobalScopes()->get();

        //Remove some of the global scopes
        //Contact::withoutGlobalScopes([
        //  FilterScope::class])->get();
    }

    public function create()
    {
        $contact = new Contact;
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        return view('contacts.create', compact('companies', 'contact'));
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return view('contacts.show', compact('contact')); // ['contact' => $contact]
    }

    // The compact() function returns an associative array of the information contained in the variable. 
    // It could only be one thing: 
        // $firstName = "Peter";
        // compact('firstName'); Returns: {"firstName": "Peter"}
    // In this case, the single variable contains an array of values, so the returned value looks like this:
        // {
        // "id":1,
        // "first_name":"Sidney",
        // "last_name":"Schinner",
        // "phone":"1-253-618-6612",
        // "email":"kayleigh90@gmail.com",
        // "address":"669 Waters Ford Apt. 980\nEast Patricia, FL 65336-6076",
        // "company_id":1,
        // "created_at":"2022-10-13T17:14:29.000000Z",
        // "updated_at":"2022-10-13T17:14:29.000000Z"}

    public function store(Request $request) 
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
            'address'    => 'required',
            'company_id' => 'required | exists:companies,id'
        ]);
        Contact::create($request->all());
        return redirect('/contacts')->with('message', "Contact Added Successfully");
    }

    public function edit($id) 
    {
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact', 'companies'));
    }

    public function update(Request $request, $id) 
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required | email',
            'address'    => 'required',
            'company_id' => 'required | exists:companies,id'
        ]);
        $contact = Contact::find($id);
        $contact->update($request->all());
        return redirect('/contacts')->with('message', "Contact Updated Successfully");
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return back()->with('message', "Contact Deleted Successfully");
    }

}