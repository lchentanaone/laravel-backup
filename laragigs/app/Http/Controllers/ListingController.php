<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index()  {
        // dd(request('tag'));
        return view('listings.index', [
            'listings' => Listing::latest()->filter
            (request(['tag', 'search']))->paginate(4)
        ]);
    }

    public function show(Listing $listing)  {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
    // Show Create Form
    public function create() {
        return view('listings.create');
    }

    // Store Listing Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' =>['required', Rule::unique('listings', 
            'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ] );
        
        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing:: create($formFields);
        
        return redirect('/')->with('message', 'Listing created succesfully!');
    }  

    public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update Listing Data
    public function update(Request $request, Listing $listing) {

        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorize Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' =>['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ] );
        
        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);
        
        return back()->with('message', 'Listing updated succesfully!');
    }  

    // Delete 
    public function destroy(Listing $listing) {

        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorize Action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted Successfuly');
    }
    public function manage() {
        return view('listings.manage', ['listings' => auth()
        ->user()->listings()->get()]);
    }
}
