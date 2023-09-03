<?php

namespace App\Http\Controllers;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    // public function index()
    // {
    //     $exams = Exam::all();
    //     return view ('exam.index')->with('exams', $exams);
    // }

    // public function create()
    // {
    //     return view('exam.create');
    // }

    // public function store(Request $request)
    // {
    //     $input = $request->all();
    //     Exam::create($input);
    //     return redirect('exam')->with('flash_message', 'Student Addedd!');
    // }


    public function show(string $id)
    {
        $exam = Exam::find($id);
        return view('exam.show')->with('exams', $exam);
    }


    // public function edit(string $id)
    // {
    //     $exam = Exam::find($id);
    //     return view('exam.edit')->with('exams', $exam);
    // }


    // public function update(Request $request, string $id)
    // {
    //     $exam = Exam::find($id);
    //     $input = $request->all();
    //     $exam->update($input);
    //     return redirect('exam')->with('flash_message', 'student Updated!');
    // }


    // public function destroy(string $id)
    // {
    //     Exam::destroy($id);
    //     return redirect('exam')->with('flash_message', 'Student deleted!');
    // }
}
