<?php

namespace App\Http\Controllers;

use App\Exports\NoticesExport;
use Illuminate\Http\Request;
use App\Models\Notice;
use Maatwebsite\Excel\Facades\Excel;

class NoticeController extends Controller
{
    
    public function index(Request $request)
    {
        $nots = Notice::when($request->filled('name'), function ($q) use ($request) {
            $q->where('name', 'LIKE', "%" . $request->name . "%");
        })
        ->get();
    return view('notice.index', compact('nots'));
    }

    
    public function create()
    {
        return view('notice.add');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'subject'=>'required',
            'n_date'=>'required',
            'topic'=>'required',
            'n_description'=>'required'
        ]);

        //dd($request->all());
        $not = new Notice;
        $not->name = $request->name;
        $not->subject = $request->subject;
        $not->n_date = $request->n_date;
        $not->topic = $request->topic;
        $not->n_description = $request->n_description;
      

        $not->save();

        return redirect()->route('notice.index')->with('notify_message', ['status' => 'success', 'msg' => 'Notice created successfully!']);
    }

    
     public function show(Request  $request)
     {
        $not = Notice::findOrFail($request->id);
        return view('notice.view', compact('not'));
     }

    
     public function edit(Request $request)
     {
        $not = Notice::where('id', $request->id)->firstOrFail();
        return view('notice.edit', compact('not'));
     }

    
     public function update(Request $request)
     {

        $not = Notice::find($request->notice);
        $not->name = $request->name;
        $not->subject = $request->subject;
        $not->n_date = $request->n_date;
        $not->topic = $request->topic;
        $not->n_description = $request->n_description;



        $not->save();

        return redirect()->route('notice.index')->with('notify_message', ['status' => 'success', 'msg' => 'Notice Updated successfully!']);
     }

    
    

     public function destroy(Request $request)
     {
        $not = Notice::find($request->notice);
        $not->delete();

        return redirect()->route('notice.index');
    }

    public function export() 
    {
        return Excel::download(new NoticesExport, 'notice.xlsx');
    }
}
