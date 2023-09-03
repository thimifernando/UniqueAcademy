<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shareComponent = \Share::page(
            'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
            'Your share text comes here',
        )
            ->facebook()
            ->whatsapp();
        return view('subject.add-subject', compact('shareComponent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        //validate the request
        $validate = $request->validate([
            'subjectName' => ['required', 'string', 'max:255'],
            'subjectStream' => ['required', 'string', 'max:255'],
        ]);

        if ($validate) {

            //create new subject
            $subject = new Subject();
            $subject->subject_name = $request->subjectName;
            $subject->subject_Stream = $request->subjectStream;
            $created = $subject->save();
            if ($created) {
                return redirect('/subject/show/')->with('success', 'Subject Created Successfully');
            } else {
                return redirect('/subject/show/')->with('error', 'Subject Not Created');
            }
        } else {
            return redirect('/subject/show/')->with('error', 'Subject Not Created');
        }


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //display all subjects
        $subjects = Subject::all();
        return view('subject.view-subject', compact('subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $shareComponent = \Share::page(
            'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
            'Your share text comes here',
        )
            ->facebook()
            ->whatsapp();
        //get advertisement by id
        $subjects = Subject::where('subject_id', $id)->get()->first();
        return view('subject.update-subject', compact('subjects', 'shareComponent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        //validate the request
        $validate = $request->validate([
            'subjectName' => ['required', 'string', 'max:255'],
            'subjectStream' => ['required', 'string', 'max:255'],
        ]);

        if ($validate) {
            //update subject
            $update = Subject::where('subject_id', $id)->get()->first()->update([
                'subject_name' => $request->subjectName,
                'subject_Stream' => $request->subjectStream
            ]);
            if ($update) {
                return redirect('/subject/show/')->with('success', 'Subject Updated Successfully');
            } else {
                return redirect('/subject/show/')->with('error', 'Subject Not Updated');
            }
        } else {
            return redirect('/subject/show/')->with('error', 'Subject Not Updated');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $response = $this->delete($id);
        if ($response > 0) {
            return redirect('subject/show')->with('success', 'Advertisement Deleted successfully');
        } else {
            return redirect('subject/show')->with('error', 'Advertisement not Deleted');
        }
    }

    public function delete($id)
    {
        //delete advertisement by id
        $delete = Subject::where('subject_id', $id)->get()->first()?->delete();
        return $delete;
    }

    public function createPDF()
    {
        // retreive all records from db
        $subjects = Subject::all();
//        echo $data;
        // share data to view
        view()->share('subject.view-subject-pdf', $subjects);
        $pdf = PDF::loadView('subject.view-subject-pdf', compact('subjects'))->setOptions(['defaultFont' => 'sans-serif'])->output();

        // download PDF file with download method
        return response()->streamDownload(
            fn() => print($pdf),
            "subjects.pdf"
        );
    }

    public function pdfView()
    {
        $subjects = Subject::all();
        return view('subject.view-subject-pdf', compact('subjects'));
    }

}
