<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserExamController extends Controller
{
    public function exam(){
        $exam = Exam::with('quiz.ques')->orderBy('id','desc')->get();
        return view('candidate.exam.index',compact('exam'));
        
    }
}
