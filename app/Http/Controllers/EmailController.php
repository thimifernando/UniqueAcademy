<?php

namespace App\Http\Controllers;

use App\Exports\MailsExport;
use App\Mail\CustomEmail;
use App\Mail\CustomMail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Email;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{   
    public function index(Request $request)
    {
        
        $mail = Email::when($request->filled('email'), function ($q) use ($request) {
                $q->where('email', 'LIKE', "%" . $request->email . "%");
            })
            ->when($request->filled('heading'), function ($q) use ($request) {
                $q->where('heading', $request->heading);
            })
            ->get();
        return view('emails.index', compact('mail'));
    }


    
    
    public function create()
    {
        return view('emails.add');
    }

    public function store(Request $request)
    {   
        //  dd($request->all());
        $request->validate([
            'email' => 'required|email|unique:emails,email',
            'heading' => 'required',
            'details' => 'required',

        ]);

        $mail = new Email;
        $mail->email = $request->email;
        $mail->heading = $request->heading;
        $mail->details = $request->details;

        $mail->save();

        Mail::to($mail->email)->send(new CustomMail($mail->heading, $mail->details));

        return redirect()->route('email.index')->with('notify_message', ['status' => 'success', 'msg' => 'Email Send successfully!']);
    }
    public function show(Request $request)
    {
        $emp = Email::findOrFail($request->email);
        return view('emails.view', compact('mail'));
    }

    public function export(Request $request)
    {
        return Excel::download(new  MailsExport, 'emails.xlsx');
    }


    
}
