<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    // add question
    public function store(Request $request,$id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'a' => 'required',
                'b' => 'required',
                'c' => 'required',
                'd' => 'required',
                'answer' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
            }
            Question::create([
                'quiz_id' => $id,
                'title' => $request->title,
                'a' => $request->a,
                'b' => $request->b,
                'c' => $request->c,
                'd' => $request->d,
                'answer' => $request->answer,
            ]);
            Toastr::success('Question create successfull');
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type', 'error');
            session()->flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // update question
    public function update(Request $request,$id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'a' => 'required',
                'b' => 'required',
                'c' => 'required',
                'd' => 'required',
                'answer' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
            }
            Question::findorfail($id)->update([
                'title' => $request->title,
                'a' => $request->a,
                'b' => $request->b,
                'c' => $request->c,
                'd' => $request->d,
                'answer' => $request->answer,
            ]);
            Toastr::success('Question update successfull');
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type', 'error');
            session()->flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // questioin view
    public function view($id) {
        $quiz = Quiz::findorfail($id);
        $ques = Question::where('quiz_id',$id)->orderBy('id','desc')->get();
        return view('admin.question.index',compact('ques','quiz'));
    }

     // questioin delete
     public function delete($id)
     {
         try {
             Question::findorfail($id)->delete();
             Toastr::success('Questioin delete successfull');
             return redirect()->back();
         } catch (Exception $error) {
             session()->flash('type', 'error');
             session()->flash('message', $error->getMessage());
             return redirect()->back();
         }
     }
}
