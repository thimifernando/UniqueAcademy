<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpecialDocument;
use App\Http\Controllers\StudentfeedbackController;
use App\Http\Controllers\SubjectController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/exam', function () {
//     return view('layouts.app');
// });
//Route::resource('employee', EmployeeController::class)->except('destroy');



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::resource("/feedback", FeedbackController::class);
});
Route::group(['middleware' => ['auth', 'auth.role:ADMIN']], function () {
    Route::get('employee', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('employee/add', [EmployeeController::class, 'create'])->name('employee.create');
    Route::get('employee/view', [EmployeeController::class, 'show'])->name('employee.show');
    Route::get('employee/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('employee/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::post('employee/status', [EmployeeController::class, 'status'])->name('employee.status');
    Route::post('employee/update', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('employee/destroy', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    Route::get('employee/export', [EmployeeController::class, 'export'])->name('employee.export');
    Route::get('employee/exportpdf', [EmployeeController::class, 'exportPDF'])->name('employee.exportpdf');

    Route::get('email', [EmailController::class, 'index'])->name('email.index');
    Route::get('email/add', [EmailController::class, 'create'])->name('email.create');
    Route::post('email/store', [EmailController::class, 'store'])->name('email.store');
    Route::get('email/export', [EmailController::class, 'export'])->name('email.export');

    Route::get('specialdocument', [SpecialDocument::class, 'index'])->name('specialdocument.index');
    Route::get('specialdocument/add', [SpecialDocument::class, 'create'])->name('specialdocument.create');
    Route::get('specialdocument/view', [PaymentController::class, 'show'])->name('specialdocument.show');
    Route::post('specialdocument/store', [SpecialDocument::class, 'store'])->name('specialdocument.store');


});
Route::group(['midlware' => ['auth', 'auth.role:SM||ADMIN']], function () {
    Route::get('student', [StudentController::class, 'index'])->name('student.index');
    Route::get('student/add', [StudentController::class, 'create'])->name('student.create');
    Route::get('student/view/{id}', [StudentController::class, 'show'])->name('student.show');
    Route::get('student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::post('student/store', [StudentController::class, 'store'])->name('student.store');
    Route::post('student/status', [StudentController::class, 'status'])->name('student.status');
    Route::post('student/update', [StudentController::class, 'update'])->name('student.update');
    Route::get('student/destroy', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('student/export', [StudentController::class, 'export'])->name('student.export');
});
Route::group(['midlware' => ['auth', 'auth.role:NM||ADMIN']], function () {


Route::get('notice', [NoticeController::class, 'index'])->name('notice.index');
Route::get('notice/add', [NoticeController::class, 'create'])->name('notice.create');
Route::get('notice/view', [NoticeController::class, 'show'])->name('notice.show');
Route::get('notice/edit', [NoticeController::class, 'edit'])->name('notice.edit');
Route::post('notice/store', [NoticeController::class, 'store'])->name('notice.store');
Route::post('notice/update', [NoticeController::class, 'update'])->name('notice.update');
Route::get('notice/destroy', [NoticeController::class, 'destroy'])->name('notice.destroy');
Route::get('notice/export', [NoticeController::class, 'export'])->name('notice.export');
});






Route::group(['midlware' => ['auth', 'auth.role:TT||ADMIN']], function () {

    Route::get('tutorial', [TutorialController::class, 'index'])->name('tutorial.index');
    Route::get('tutorial/add', [TutorialController::class, 'create'])->name('tutorial.create');
    Route::get('tutorial/view', [TutorialController::class, 'show'])->name('tutorial.show');
    Route::get('tutorial/edit', [TutorialController::class, 'edit'])->name('tutorial.edit');
    Route::post('tutorial/store', [TutorialController::class, 'store'])->name('tutorial.store');
    Route::post('tutorial/update', [TutorialController::class, 'update'])->name('tutorial.update');
    Route::get('tutorial/destroy', [TutorialController::class, 'destroy'])->name('tutorial.destroy');
    Route::get('tutorial/export', [TutorialController::class, 'export'])->name('tutorial.export');
});

Route::group(['midlware' => ['auth', 'auth.role:PM||ADMIN']], function () {

    Route::get('payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('payment/add', [PaymentController::class, 'create'])->name('payment.create');
    Route::get('payment/view', [PaymentController::class, 'show'])->name('payment.show');
    Route::post('payment/store', [PaymentController::class, 'store'])->name('payment.store');


});



Route::group(['midlware' => ['auth', 'auth.role:T||ADMIN']], function () {

    Route::get('teacher', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('teacher/add', [TeacherController::class, 'create'])->name('teacher.create');
    Route::get('teacher/view/{id}', [TeacherController::class, 'show'])->name('teacher.show');
    Route::get('teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::post('teacher/store', [TeacherController::class, 'store'])->name('teacher.store');
    Route::post('teacher/status', [TeacherController::class, 'status'])->name('teacher.status');
    Route::post('teacher/update', [TeacherController::class, 'update'])->name('teacher.update');
    Route::get('teacher/destroy', [TeacherController::class, 'destroy'])->name('teacher.destroy');
    Route::get('teacher/export', [TeacherController::class, 'export'])->name('teacher.export');
});



Route::group(['midlware' => ['auth', 'auth.role:ADMIN']], function () {

    Route::resource("/feedback", FeedbackController::class);

    Route::resource("/sfeedback", StudentfeedbackController::class);

    //xl download
    Route::get('sfeedbacks/export', [StudentfeedbackController::class, 'export']);


});


//kavindu 
Route::group(['midlware' => ['auth', 'auth.role:EXAM']], function () {

Route::get('question-list',[QuestionController::class, 'index']);
Route::get('add-question',[QuestionController::class, 'addQuestion']);
Route::post('save-question',[QuestionController::class, 'saveQuestion']);
Route::get('edit-question/{id}',[QuestionController::class, 'editQuestion']);//list edit button
Route::post('update-question',[QuestionController::class, 'updateQuestion']);
Route::get('delete-question/{id}',[QuestionController::class, 'deleteQuestion']);
Route::post('view-question',[QuestionController::class, 'viewQuestion']);
Route::post('startquiz',[QuestionController::class, 'startquiz']);
Route::post('question-list',[QuestionController::class, 'questionList']);
Route::get('exam-instruction',[QuestionController::class, 'examInstruction']);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Route::get('/exam-interface', function () {
//     return view('exam.exam-interface');
// });

Route::get('exam-interface/{id}',[QuestionController::class, 'examQuestion'])->name('examQuestion');
Route::get('exam-list',[QuestionController::class, 'exam']);
Route::get('add-exam',[QuestionController::class, 'addExam']);
Route::post('save-exam',[QuestionController::class, 'saveExam']);
Route::get('edit-exam/{id}',[QuestionController::class, 'editExam']);
Route::post('update-exam',[QuestionController::class, 'updateExam']);
Route::get('delete-exam/{id}',[QuestionController::class, 'deleteExam']);
Route::get('questions/export',[QuestionController::class, 'exportQuestion']);
Route::get('exams/export',[QuestionController::class, 'export']);//question list eke ek
Route::resource('/exam', ExamController::class);
  


});

Route::group(['midlware' => ['auth', 'auth.role:MM||ADMIN']], function () {

    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/advertisement', [AdvertisementController::class, 'index']);
    Route::get('/advertisement/edit/{id}', [AdvertisementController::class, 'edit']);
    Route::get('/advertisement/delete/{id}', [AdvertisementController::class, 'destroy']);
    Route::get('/advertisement/pdf', [AdvertisementController::class, 'createPDF']);
    Route::get('/advertisement/show', [AdvertisementController::class, 'pdfView']);


    //Subject
    Route::get('/subject', [SubjectController::class, 'index']);
    Route::get('/subject/show/', [SubjectController::class, 'show']);
    Route::get('/subject/edit/{id}', [SubjectController::class, 'edit']);
    Route::get('/subject/delete/{id}', [SubjectController::class, 'destroy']);
    Route::get('/subject/pdf', [SubjectController::class, 'createPDF']);
    Route::get('/subject/pdfShow', [SubjectController::class, 'pdfView']);

    Route::post('/advertisement/create/', [AdvertisementController::class, 'create']);
    Route::post('/advertisement/update/{id}', [AdvertisementController::class, 'update']);
    Route::get('/advertisement/show', [AdvertisementController::class, 'show']);
    Route::delete('/advertisement/delete/{id}', [AdvertisementController::class, 'delete']);
    
    
    Route::post('/subject/create', [SubjectController::class, 'create']);
    Route::get('/subject/show', [SubjectController::class, 'show']);
    Route::post('/subject/update/{id}', [SubjectController::class, 'update']);
    Route::delete('/subject/delete/{id}', [SubjectController::class, 'delete']);

});
