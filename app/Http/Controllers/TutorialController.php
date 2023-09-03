<?php

namespace App\Http\Controllers;

use App\Exports\TutorialExport;
use Illuminate\Http\Request;
use App\Models\Tutorial;
use Maatwebsite\Excel\Facades\Excel;

class TutorialController extends Controller
{
    public function index(Request $request)
    {
        
        $tute = Tutorial::when($request->filled('subject'), function ($q) use ($request) {
                $q->where('subject', $request->subject);
            })
            ->get();
        return view('tutorial.index', compact('tute'));
    }

    public function create()
    {
        return view('tutorial.add');
    }

    public function store(Request $request)
    {   
        //  dd($request->all());

        $request->validate([
            'date' => 'required|date|after:today',
            'subject' => 'required',
            'item' => 'required',
        ]);


        
        $file = $request->file('item');
        $file_name = $file->hashName();
        $file->store('public/tutorials');
        $tute = new Tutorial;
        $tute->subject = $request->subject;
        $tute->date = $request->date;
        $tute->item = 'tutorials/'.$file_name;
        $tute->save();


        return redirect()->route('tutorial.index')->with('notify_message', ['status' => 'success', 'msg' => 'Tute Upload successfully!']);
    }

    public function show(Request $request)
    {
        $tute = Tutorial::findOrFail($request->id);
        return view('tutorial.view', compact('tute'));
    }
    public function edit(Request $request)
    {
        $tute = Tutorial::where('id',$request->id)->firstOrfail();
        return view('tutorial.edit', compact('tute'));
    }
    public function update(Request $request)
    {
        $tute = Tutorial::find($request->tutorial);
        $tute->subject = $request->subject;
        $tute->date = $request->date;
        $tute->item = $request->item;

        $tute->save();

        return redirect()->route('tutorial.index')->with('notify_message', ['status' => 'success', 'msg' => 'Tute Edit successfully!']);

    }


    public function destroy(Request $request)
    {
       $tute = Tutorial::find($request->tutorial);
       $tute->delete();

       return redirect()->route('tutorial.index');
   }

   public function export() 
   {
       return Excel::download(new TutorialExport, 'tutorial.xlsx');
   }

}
