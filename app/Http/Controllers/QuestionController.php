<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Exams;
use Illuminate\Support\Facades\Session;
use App\Exports\ExamsExport;
use App\Exports\QuestionExport;
use Maatwebsite\Excel\Facades\Excel;

class QuestionController extends Controller
{
    public function index(){
        $data = Question::get();
        //return $data;
        return view('exam.question-list',compact('data'));
    }

    public function addQuestion(){
        return view('exam.add-question');
    }

    public function questionList(){
        return view('exam.question-list');
    }



    public function saveQuestion(Request $request){

        $request->validate([
            'question' => 'required',
            'opA' => 'required',
            'opB' => 'required',
            'opC' => 'required',
            'opD' => 'required',
            'answer' => 'required',
        ]);

        $question = $request->question;
        $optionA = $request->opA;
        $optionB = $request->opB;
        $optionC = $request->opC;
        $optionD = $request->opD;
        $answer = $request->answer;

        $que = new Question();
        $que-> question = $question;
        $que-> opA = $optionA;
        $que-> opB = $optionB;
        $que-> opC = $optionC;
        $que-> opD = $optionD;
        $que-> answer = $answer;
        $que->save();

        return redirect()->back()->with('success','Question Added Successfully!'); //meka pennanne ne
    }

    public function editQuestion($id){
        $data = Question::where('id','=', $id)->first();
        return view('exam.edit-question',compact('data'));
    }




    public function updateQuestion(Request $request){
        $request->validate([
            'question' => 'required',
            'opA' => 'required',
            'opB' => 'required',
            'opC' => 'required',
            'opD' => 'required',
            'answer' => 'required',
        ]);

        $id = $request->id;
        $question = $request->question;
        $optionA = $request->opA;
        $optionB = $request->opB;
        $optionC = $request->opC;
        $optionD = $request->opD;
        $answer = $request->answer;

        Question::where('id', '=', $id)->update([
            'question' => $question,
            'opA' => $optionA,
            'opB' => $optionB,
            'opC' => $optionC,
            'opD' => $optionD,
            'answer' => $answer,
        ]);
        return redirect()->back()->with('success','Question Update Successfully!');
    }

    public function deleteQuestion($id){
        Question::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Question Deleted Successfully!');
    }
    public function examInstruction(){
        $q_id = Question::orderBy('id')->first()?->id;
        return view('exam.exam-instruction', compact('q_id'));
    }


    // public function viewQuestion($id){
    //     $data = Question::where('id','=', $id)->first();
    //     return view('exam.view-question',compact('data'));
    // }

    public function exam(){ 
        $Data = Exams::get();
        //return $data;
        return view('exam.exam-list',compact('Data'));
    }

    public function addExam(){
        return view('exam.add-exam');
    }

    public function saveExam(Request $request){

        $request->validate([
            'ex_name' => 'required',
            'subject' => 'required',
            'date' => 'required',
            'time' => 'required',
            'attempt' => 'required',
            // 'add_question' => 'required',
            // 'show_question' => 'required',
        ]);

        $ExamName = $request->ex_name;
        $Subject = $request->subject;
        $Date = $request->date;
        $Time = $request->time;
        $Attempt = $request->attempt;
        // $AddQuestion = $request->add_question;
        // $showQuestion = $request->show_question;

        $exe = new Exams();
        $exe-> ex_name = $ExamName;
        $exe-> subject = $Subject;
        $exe-> date = $Date;
        $exe-> time = $Time;
        $exe-> attempt = $Attempt;
        // $exe-> add_question = $AddQuestion;
        // $exe-> show_question = $showQuestion;
        $exe->save();

        return redirect()->back()->with('success','Exam Added Successfully!'); //meka pennanne ne
    }

    public function editExam($id){
        $Data = Exams::where('id','=', $id)->first();
        return view('exam.edit-exam',compact('Data'));
    }

    public function updateExam(Request $request){

        $request->validate([
            'ex_name' => 'required',
            'subject' => 'required',
            'date' => 'required',
            'time' => 'required',
            'attempt' => 'required',
            // 'add_question' => 'required',
            // 'show_question' => 'required',
        ]);

        $id = $request->id;
        $ExamName = $request->ex_name;
        $Subject = $request->subject;
        $Date = $request->date;
        $Time = $request->time;
        $Attempt = $request->attempt;
        // $AddQuestion = $request->add_question;
        // $showQuestion = $request->show_question;

        Exams::where('id', '=', $id)->update([
        'ex_name' => $ExamName,
        'subject' => $Subject,
        'date' => $Date,
        'time' => $Time,
        'attempt' => $Attempt,
        // 'add_question' => $AddQuestion,
        // 'show_question' => $showQuestion,

    ]);

        return redirect()->back()->with('success','Exam Update Successfully!'); //meka pennanne ne
    }

    public function deleteExam($id){
        Exams::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Question Deleted Successfully!');
    }

    public function view(string $id)
    {
        $exam = Exams::find($id);
        return view('exam.view-exam')->with('exams', $exam);
    }

    public function export()
    {
        return Excel::download(new ExamsExport, 'exams.xlsx');
    }

    public function exportQuestion()
    {
        return Excel::download(new QuestionExport, 'questions.xlsx');
    }

    public function examQuestion(Request $request)
    {
        $question = Question::findOrFail($request->id);

        $prev_q_id = Question::where('id', '<', $request->id)->orderBy('id', 'desc')->first()?->id;
        $next_q_id = Question::where('id', '>', $request->id)->orderBy('id')->first()?->id;

        return view('exam.exam-interface', compact('question', 'prev_q_id', 'next_q_id'));
    }
    // public function startquiz(){
    //     Session::put('nextq','1');
    //     Session::put('wrongans','1');
    //     Session::put('correctans','1');

    //     $q = question::all()->first();

    //     return view('exam.exam-interface')->with(['question'=>$q]);
    // }


//subject part
}
