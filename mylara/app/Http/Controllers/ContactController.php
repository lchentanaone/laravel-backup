<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::all();
        return $contact;
    }
    public function store(Request $request)
    {
        return Contact::create($request->all());
    }
    public function show($id)
    {
        return Contact::find($id);
    }
}
