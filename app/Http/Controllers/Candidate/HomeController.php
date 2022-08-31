<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Item;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // user dashboard page
    public function index()
    {
        return view('candidate.dashboard');
    }

    // user logut
    public function logout()
    {
        Auth::logout();
        Toastr::success('Logout Succesful!!!');
        return redirect()->route('login');
    }

    // user result
    public function result($id)
    {
        $check = Answer::where('exam_id', $id)->where('user_id', Auth::user()->id)->first();
        if ($check) {
            $items = Item::where('answer_id',$check->id)->get();
            $data = Question::where('quiz_id', $check->quiz_id)->get();
            $result = Result::where('ans_id', $check->id)->first()->total;
            $title = Quiz::findorfail($check->quiz_id)->title;
            return view('candidate.result.result',compact('result','data','title','items'));
        }
        abort(404);
    }
}
