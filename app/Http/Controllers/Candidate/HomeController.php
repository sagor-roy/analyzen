<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
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
}
