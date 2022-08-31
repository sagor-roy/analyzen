<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\Item;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    //exam page
    public function exam()
    {
        $quiz = Quiz::all();
        $user = User::where('status', 1)->where('role', '!=', 'admin')->get();
        $exam = Exam::with('quiz', 'user')->orderBy('id', 'desc')->get();
        return view('admin.exam.index', compact('quiz', 'user', 'exam'));
    }

    // exam store
    public function store(Request $request)
    {
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

    public function view($id)
    {
        $ans = Answer::where('exam_id', $id)->with('user', 'ques')->orderBy('id', 'desc')->get();
        //return $ans;
        return view('admin.exam.list', compact('ans'));
    }

    // user result
    public function result($id, $user_id)
    {
        $check = Answer::where('exam_id', $id)->where('user_id', $user_id)->first();
        if ($check) {
            $items = Item::where('answer_id', $check->id)->get();
            $data = Question::where('quiz_id', $check->quiz_id)->get();
            $result = Result::where('ans_id', $check->id)->first()->total;
            $title = Quiz::findorfail($check->quiz_id)->title;
            return view('admin.exam.result', compact('result', 'data', 'title', 'items'));
        }
        abort(404);
    }
}
