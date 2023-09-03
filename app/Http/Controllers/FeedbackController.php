<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return view ('feedback.index')->with('feedbacks', $feedbacks);
    }

    public function create()
    {
        return view('feedback.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'f_name'=>'required',
            'f_date'=>'required',
            'subject'=>'required',
            'description'=>'required'

        ]);

        $input = $request->all();
        Feedback::create($input);
        return redirect('feedback')->with('flash_message', 'Student Addedd!');
    }

    public function show($f_id)
    {
        $feedbacks = Feedback::find($f_id);
        return view('feedback.show')->with('feedbacks', $feedbacks);
    }

    public function edit($f_id)
    {
        $feedbacks = Feedback::find($f_id);
        return view('feedback.edit')->with('feedbacks', $feedbacks);
    }

    public function update(Request $request, $f_id)
    {
        $feedbacks = Feedback::find($f_id);
        $input = $request->all();
        $feedbacks->update($input);
        return redirect('feedback')->with('flash_message', 'feedback Updated!');
    }

    public function destroy($f_id)
    {
        Feedback::destroy($f_id);
        return redirect('feedback')->with('flash_message', 'feedback deleted!');
    }




}
