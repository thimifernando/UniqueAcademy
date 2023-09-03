<?php

namespace App\Http\Controllers;
use  App\Models\Sfeedback;
use Illuminate\Http\Request;
use App\Exports\SfeedbackExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentfeedbackController extends Controller
{
    public function index(Request $request)
    {
        $sfeedbacks = Sfeedback::when($request->filled('search_fs_name'), function($q) use ($request) {
            $q->where('fs_name', 'like', '%'.$request->search_fs_name.'%');
        })->get();



        return view('sfeedback.index')->with('sfeedbacks', $sfeedbacks);
    }
    
    public function create()
    {
        return view('sfeedback.create');
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'fs_name'=>'required',
            'fs_date'=>'required',
            'subject'=>'required',
            'email'=>'required',
            'phonenumber'=>'required',
            'description'=>'required',
            
        ]);



        $input = $request->all();
        Sfeedback::create($input);
        return redirect('sfeedback')->with('flash_message', 'StudentFeedback Addedd!');  
    }
    
    public function show($id)
    {
        $sfeedbacks = Sfeedback::find($id);
        return view('sfeedback.show')->with('sfeedbacks', $sfeedbacks);
    }
    
    public function edit($id)
    {
        $sfeedbacks = Sfeedback::find($id);
        return view('sfeedback.edit')->with('sfeedbacks', $sfeedbacks);
    }
  
    public function update(Request $request, $id)
    {
        $sfeedbacks = Sfeedback::find($id);
        $input = $request->all();
        $sfeedbacks->update($input);
        return redirect('sfeedback')->with('flash_message', 'studentfeedback Updated!');  
    }
  
    public function destroy($id)
    {
        Sfeedback::destroy($id);
        return redirect('sfeedback')->with('flash_message', 'Studentfeedback deleted!');  
    } 
    public function export() 
    {
        return Excel::download(new SfeedbackExport, 'feedback.xlsx');
    }

    
}
