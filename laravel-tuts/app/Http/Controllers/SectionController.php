<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $section = Section::all();
        return $section;
    }
    public function store(Request $request)
    {
        return Section::create($request->all());
    }
    public function show($id)
    {
        return Section::find($id);
    }
    public function update(Request $request, $id)
    {
        $section=Section::find($id);
        $section->update($request->all());
        return $section;
    }
    public function destroy($id)
    {
        $section = Section::find($id);
        $section->delete();
        return "Sucessfuly deleted";
    }
}
