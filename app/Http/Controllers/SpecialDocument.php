<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class SpecialDocument extends Controller
{
    public function index(Request $request){

        $doc = Document::when($request->filled('name'), function ($q) use ($request) {
            $q->where('name', 'LIKE', "%" . $request->name . "%");
        })
        ->get();

        return view('document.index', compact('doc'));
    }

    public function create()
    {
        return view('document.add');
    }

    public function store(Request $request){
        $request->validate([
            'date' => 'required|date|after:yesterday',
            'name' => 'required',
            'file' => 'required'
        ]);
        $file = $request->file('file');
        $file_name = $file->hashName();
        $file->store('public/documents');

        $doc = new Document;
        $doc->name = $request->name;
        $doc->date = $request->date;
        $doc->file = 'documents/'.$file_name;

        $doc->save();


        return redirect()->route('specialdocument.index')->with('notify_message', ['status' => 'success', 'msg' => 'File Uploded successfully!']);

        
    }
    public function show(Request  $request)
    {
        $doc = Document::findOrFail($request->id);
        return view('document.view', compact('doc'));
    }


}
