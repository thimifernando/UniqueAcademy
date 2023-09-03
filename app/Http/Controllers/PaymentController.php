<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    
    public function index(Request $request)
    {
        $pays = Payment::when($request->filled('s_name'), function ($q) use ($request) {
            $q->where('s_name', 'LIKE', "%" . $request->s_name . "%");
        })
        ->get();
    return view('payment.index', compact('pays'));
    }

    
    public function create()
    {
        return view('payment.add');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            // 's_id'=>'required',
            's_name'=>'required',
            'teachers_name'=>'required',
            'subject'=>'required',
            'grade'=>'required',
            'month'=>'required',
            'photo'=>'required'
        ]);


        //dd($request->all());
        $file = $request->file('photo');
        $file_name = $file->hashName();
        $file->store('public/payments');
        $pay = new Payment;
        // $pay->s_id = $request->s_id;
        $pay->s_name = $request->s_name;
        $pay->teachers_name = $request->teachers_name;
        $pay->subject = $request->subject;
        $pay->grade = $request->grade;
        $pay->month = $request->month;
        $pay->photo = 'payments/'.$file_name;
      

        $pay->save();

        return redirect()->route('payment.index')->with('notify_message', ['status' => 'success', 'msg' => 'Payment created successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request  $request)
    {
        $pay = Payment::findOrFail($request->id);
        return view('payment.view', compact('pay'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
