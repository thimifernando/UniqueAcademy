<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DeleteEmployeeRequest;
use App\Http\Requests\StatusEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Teacher;
use App\Exports\TeachersExport;
use Maatwebsite\Excel\Facades\Excel;


class TeacherController extends Controller
{
    public function index(Request $request)
    {  
        $emps = User::where('user_role', 'T')
            ->when($request->filled('name'), function ($q) use ($request) {
                $q->where('name', 'LIKE', "%" . $request->name . "%");
            })
            ->when($request->filled('status'), function ($q) use ($request) {
                $q->where('status', $request->status);
            })
            ->when($request->filled('email'), function ($q) use ($request) {
                $q->where('email', 'LIKE', "%" . $request->email . "%");
            })
            
            ->get();
            // dd($emps);
        return view('teacher.index', compact('emps'));
    }
    public function create()
    {
        return view('teacher.add');
    }

    public function store(Request $request)
    {

        $request->validate([
           
            'name'=>'required',
            'email'=>'required|email',
            'password'=> ['required', 'regex:/^(?=.*[A-Z])(?=.*\d{7})[A-Z\d]+$/'], //password can only input one upper case and 7 numbers
            'password_confirmation' => 'required|same:password',
            'description'=>'required|min:5|max:100',
            'subject'=>'required',
            'grade'=>'required|numeric',
            'phone' => ['required', 'regex:/^\d{10}$/'], //10 digit no
            
        ]);

        // dd($request->all());
        $emp = new User;
        $emp->name = $request->name;
        $emp->email = $request->email;
        $emp->password = Hash::make($request->password);
        $emp->phone = $request->phone;
        $emp->address = $request->address;
        $emp->user_role = 'T';
        $emp->gender = $request->gender;
        $emp->status = 'A';
        $emp->save();

        $tch = new Teacher();
        $tch->user_id = $emp->id;
        $tch->birthday = $request->birthday;
        $tch->description = $request->description;
        $tch->subject = $request->subject;
        $tch->grade = $request->grade;

        $tch->save();
        // dd($request->all());

        return redirect()->route('teacher.index')->with('notify_message', ['status' => 'success', 'msg' => 'Teacher created successfully!']);
    }

    public function show(Request $request)
    {
        $emp = User::with('teacher')->findOrFail($request->id);
        // $std = Student::where('user_id', $request->id)->firstOrFail();
        return view('teacher.view', compact('emp'));
    }

    public function edit(Request $request)
    {
        $emp = User::with('teacher')->findOrFail($request->id);
        return view('teacher.edit', compact('emp'));
    }

    public function update(Request $request)
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



        return redirect()->route('teacher.index')->with('notify_message', ['status' => 'success', 'msg' => 'Teacher Updated successfully!']);
    }

    public function status(Request $request)
    {
        $emp = User::find($request->id);
        $emp->status = $request->status;
        $emp->save();

        return redirect()->route('teacher.index')->with('notify_message', ['status' => 'success', 'msg' => 'Teacher successfully ' . ($request->is_active ? 'Activated' : 'Deactivated') . '!']);
    }
    public function destroy(Request $request)
    {
        $emp = User::find($request->employee);
        $emp->delete();

        return redirect()->route('teacher.index');
    }

    public function export() 
    {
        return Excel::download(new TeachersExport, 'teachers.xlsx');
    }

    
}
