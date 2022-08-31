<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Candidate\HomeController;
use App\Http\Controllers\Candidate\UserExamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//******************* AUTH ********************* */
//************************************************ */
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/store', [AuthController::class, 'store'])->name('store');
    Route::post('/access', [AuthController::class, 'access'])->name('access');
});


//******************* ADMIN ********************* */
//************************************************ */
Route::prefix('admin')->middleware('auth','isAdmin')->name('admin.')->group(function () {
    // logout route
    Route::get('logout', [DashboardController::class, 'logout'])->name('logout');
    // admin dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // user manage route
    Route::get('user', [UserController::class, 'user'])->name('user');
    Route::put('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('user/detail/{id}', [UserController::class, 'detail'])->name('user.detail');
    Route::put('user/status/{id}', [UserController::class, 'status'])->name('user.status');
    Route::get('user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

    // quiz manage route
    Route::get('quiz',[QuizController::class,'quiz'])->name('quiz');
    Route::post('quiz/store',[QuizController::class,'store'])->name('quiz.store');
    Route::post('quiz/update/{id}',[QuizController::class,'update'])->name('quiz.update');
    Route::get('quiz/delete/{id}',[QuizController::class,'delete'])->name('quiz.delete');

    // question manage route
    Route::post('question/store/{id}',[QuestionController::class,'store'])->name('question.store');
    Route::get('question/view/{id}',[QuestionController::class,'view'])->name('question.view');
    Route::put('question/update/{id}',[QuestionController::class,'update'])->name('question.update');
    Route::get('question/delete/{id}',[QuestionController::class,'delete'])->name('question.delete');

    // exam manage route
    Route::get('exam',[ExamController::class,'exam'])->name('exam');
    Route::post('exam/store',[ExamController::class,'store'])->name('exam.store');
});

//******************* CANDIDATE ********************* */
//************************************************ */
Route::prefix('user')->middleware('auth','isUser')->name('user.')->group(function () {
    // logut route
    Route::get('logout', [HomeController::class, 'logout'])->name('logout');
    // candidate dashboard
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('result/{id}', [HomeController::class, 'result'])->name('result');

    // exam manage route
    Route::get('exam',[UserExamController::class,'exam'])->name('exam');
    Route::get('exam/{exam_id}',[UserExamController::class,'start'])->name('exam.start');
    Route::post('exam/store',[UserExamController::class,'store'])->name('exam.store');
    
});
