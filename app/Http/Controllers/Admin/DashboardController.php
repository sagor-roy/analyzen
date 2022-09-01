<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // admin dashboard page
    public function index(){
        return view('admin.dashboard');
    }

    // admin logut
    public function logout(){
        Auth::logout();
        Toastr::success('Logout Succesful!!!');
        return redirect()->route('login');
    }
}
