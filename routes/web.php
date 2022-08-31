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



//******************* AUTH ROUTE ********************* */
//************************************************ */
Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::post('/access', 'access')->name('access');
});


//******************* ADMIN ROUTE ********************* */
//************************************************ */
Route::prefix('admin')->middleware('auth', 'isAdmin')->name('admin.')->group(function () {
    // logout route
    Route::get('logout', [DashboardController::class, 'logout'])->name('logout');
    // admin dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // user manage route
    Route::prefix('user')->controller(UserController::class)->group(function () {
        Route::get('/', 'user')->name('user');
        Route::put('edit/{id}', 'edit')->name('user.edit');
        Route::get('detail/{id}', 'detail')->name('user.detail');
        Route::put('status/{id}', 'status')->name('user.status');
        Route::get('delete/{id}', 'delete')->name('user.delete');
    });

    // quiz manage route
    Route::prefix('quiz')->controller(QuizController::class)->group(function () {
        Route::get('/', 'quiz')->name('quiz');
        Route::post('store', 'store')->name('quiz.store');
        Route::post('update/{id}', 'update')->name('quiz.update');
        Route::get('delete/{id}', 'delete')->name('quiz.delete');
    });

    // question manage route
    Route::prefix('question')->controller(QuestionController::class)->group(function () {
        Route::post('store/{id}', 'store')->name('question.store');
        Route::get('view/{id}', 'view')->name('question.view');
        Route::put('update/{id}', 'update')->name('question.update');
        Route::get('delete/{id}', 'delete')->name('question.delete');
    });

    // exam manage route
    Route::prefix('exam')->controller(ExamController::class)->group(function () {
        Route::get('/', 'exam')->name('exam');
        Route::post('store', 'store')->name('exam.store');
        Route::get('view/{id}', 'view')->name('exam.view');
        Route::get('result/{exam_id}/{user_id}', 'result')->name('exam.result');
    });
});

//******************* CANDIDATE ROUTE ********************* */
//************************************************ */
Route::prefix('user')->middleware('auth', 'isUser')->name('user.')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        // logut route
        Route::get('logout', 'logout')->name('logout');
        // candidate dashboard
        Route::get('dashboard', 'index')->name('dashboard');
        Route::get('result/{id}', 'result')->name('result');
    });
    // exam manage route
    Route::prefix('exam')->controller(UserExamController::class)->group(function () {
        Route::get('/', 'exam')->name('exam');
        Route::get('/{exam_id}', 'start')->name('exam.start');
        Route::post('/store', 'store')->name('exam.store');
    });
});
