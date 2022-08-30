<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Quiz;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    //exam page
    public function exam(){
        $quiz = Quiz::all();
        $user = User::where('status',1)->where('role','!=','admin')->get();
        $exam = Exam::with('quiz','user')->get();
        return view('admin.exam.index',compact('quiz','user','exam'));
    }

    // exam store
    public function store(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'quiz' => 'required',
                'user' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
            }
            Exam::create([
                'quiz_id' => $request->quiz,
                'user_id' => json_encode($request->user)
            ]);
            Toastr::success('Exam group create successfull');
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type', 'error');
            session()->flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
