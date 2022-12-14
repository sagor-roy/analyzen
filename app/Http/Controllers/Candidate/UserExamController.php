<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\Item;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use App\Trait\ResultTraits;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserExamController extends Controller
{

    // trait
    use ResultTraits;


    // user exam list page
    public function exam()
    {
        $exam = Exam::with('quiz.ques')->orderBy('id', 'desc')->get();
        return view('candidate.exam.index', compact('exam'));
    }

    // user exam list page
    public function start($exam_id)
    {
        try {
            $check = Answer::where('exam_id', $exam_id)->where('user_id', Auth::user()->id)->first();
            if (!$check) {
                $exam = Exam::findorfail($exam_id);
                $user = json_decode($exam->user_id);
                $answer = Answer::create([
                    'exam_id' => $exam->id,
                    'quiz_id' => $exam->quiz_id,
                    'user_id' => Auth::user()->id
                ]);
                $timer = date('M d, Y H:i:s', strtotime($answer->created_at . ' +' . $exam->time . ' minutes'));
                foreach ($user as $users) {
                    if (Auth::user()->id == $users) {
                        $data = Question::where('quiz_id', $exam->quiz_id)->get();
                        $quiz = Quiz::findorfail($exam->quiz_id);
                        return view('candidate.exam.question', compact('data', 'quiz', 'exam_id', 'timer'));
                    }
                }
                abort(404);
            }
            Toastr::warning("Already you have attend this exam");
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type', 'error');
            session()->flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // exam store
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'answer' => 'required|array',
                'answer.*' => "required|string",
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
            }

            $answer = Answer::where(['exam_id' => $request->exam_id, 'quiz_id' => $request->quiz_id, 'user_id' => Auth::user()->id])->first();
            $exam = Exam::findorfail($request->exam_id);
            $newDate = date('M d, Y H:i:s', strtotime($answer->created_at . ' +' . $exam->time . ' minutes'));
            $now = date('M d, Y H:i:s', strtotime(now()));

            if ($now <= $newDate) {
                foreach ($request->answer as $key => $value) {
                    Item::create([
                        'answer_id' => $answer->id,
                        'ques_id' => $key,
                        'answer' => $value,
                    ]);
                }
                $result = $this->result($request->quiz_id, $answer->id);
                Result::create([
                    'ans_id' => $answer->id,
                    'total' => $result
                ]);

                Toastr::success("Your marks is : " . $result);
                return redirect()->route('user.result', $request->exam_id);
            }
            Toastr::error("Your exam will not be counted because you did not complete the exam in time");
            session()->flash('type', 'error');
            session()->flash('message', "Your exam will not be counted because you did not complete the exam in time");
            return redirect()->route('user.exam');
        } catch (Exception $error) {
            session()->flash('type', 'error');
            session()->flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
