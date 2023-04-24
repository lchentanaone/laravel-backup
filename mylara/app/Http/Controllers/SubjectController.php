<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subject = Subject::all();
        return $subject;
    } public function store(Request $request)
    {
        return Subject::create($request->all());
    }
    public function show($id)
    {
        return Subject::find($id);
    }
}
