<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
    // quiz page
    public function quiz()
    {
        $quiz = Quiz::orderBy('id', 'desc')->with('ques')->get();
        return view('admin.quiz.index', compact('quiz'));
    }

    // add quiz
    public function store(Request $request)
    {
        // return $request;
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
            }
            Quiz::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            Toastr::success('Quiz create successfull');
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type', 'error');
            session()->flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // update quiz
    public function update(Request $request, $id)
    {
        // return $request;
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
            }
            Quiz::findorfail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            Toastr::success('Quiz update successfull');
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type', 'error');
            session()->flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

     // quiz delete
     public function delete($id)
     {
         try {
             Quiz::findorfail($id)->delete();
             Toastr::success('Quiz delete successfull');
             return redirect()->back();
         } catch (Exception $error) {
             session()->flash('type', 'error');
             session()->flash('message', $error->getMessage());
             return redirect()->back();
         }
     }
}
