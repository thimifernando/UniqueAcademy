<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeDeleteRequest;
use App\Http\Requests\EmployeeStatusRequest;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;

use App\Mail\WelcomeMail;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Exports\UsersExport;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        
        $emps = User::when($request->filled('name'), function ($q) use ($request) {
            $q->where('name', 'LIKE', "%" . $request->name . "%");
        })
            ->when($request->filled('status'), function ($q) use ($request) {
                $q->where('status', $request->status);
            })
            ->when($request->filled('email'), function ($q) use ($request) {
                $q->where('email', 'LIKE', "%" . $request->email . "%");
            })
            ->get();
        return view('employee.index', compact('emps'));
    }
    public function create()
    {
        return view('employee.add');
    }
    public function store(EmployeeStoreRequest $request)
    {
        //dd($request->all());
        $emp = new User;
        $emp->name = $request->name;
        $emp->email = $request->email;
        $emp->password = Hash::make($request->password);
        $emp->phone = $request->phone;
        $emp->address = $request->address;
        $emp->user_role = $request->user_role;
        $emp->gender = $request->gender;
        $emp->status = 'A';

        $emp->save();
        
        Mail::to($emp->email)->send(new WelcomeMail($emp));

        return redirect()->route('employee.index')->with('notify_message', ['status' => 'success', 'msg' => 'Employee created successfully!']);
    }

    public function show(Request $request)
    {
        $emp = User::findOrFail($request->employee);
        return view('employee.view', compact('emp'));
    }

    public function edit(Request $request)
    {
        $emp = User::findOrFail($request->employee);
        return view('employee.edit', compact('emp'));
    }

    public function update(EmployeeUpdateRequest $request)
    {
        $emp = User::find($request->employee);
        $emp->name = $request->name;
        $emp->email = $request->email;
        if (!empty($request->password)) {
            $emp->password = Hash::make($request->password);
        }
        $emp->gender = $request->gender;
        $emp->phone = $request->phone;
        $emp->address = $request->address;



        $emp->save();

        return redirect()->route('employee.index')->with('notify_message', ['status' => 'success', 'msg' => 'Employee Updated successfully!']);
    }

    public function status(Request $request)
    {
        $emp = User::find($request->id);
        $emp->status = $request->status;
        $emp->save();

        return redirect()->route('employee.index')->with('notify_message', ['status' => 'success', 'msg' => 'Employee successfully ' . ($request->is_active ? 'Activated' : 'Deactivated') . '!']);
    }
    public function destroy(Request $request)
    {
        $emp = User::find($request->employee);
        $emp->delete();

        return redirect()->route('employee.index');
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'employees.xlsx');
    }
    public function exportPDF() 
    {
        $employees = User::all();
        $pdf = PDF::loadView('employee.exports.pdf', compact('employees'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('employees.pdf');;
    }
}
