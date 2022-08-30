<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // login page
    public function login()
    {
        return view('auth.login');
    }

    // register page
    public function register()
    {
        return view('auth.register');
    }


    // login
    public function access(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                if (Auth::user()->status == 1) {
                    if (Auth::user()->role === 'admin') {
                        Toastr::success(Auth::user()->name . ' Welcome to your Dashboard');
                        return redirect()->route('admin.dashboard');
                    }
                    Toastr::success(Auth::user()->name . ' Welcome to your Dashboard');
                    return redirect()->route('user.dashboard');
                }
                Auth::logout();
                Session::flash('type', 'warning');
                Session::flash('message', 'Your account has not been activated yet. Please wait...');
                return redirect()->route('login');
            }
            Toastr::error('Your email or password does not match our record');
            Session::flash('type', 'error');
            Session::flash('message', 'Your email or password does not match our record');
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type', 'error');
            session()->flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // user register
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'link' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed',
            ]);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => 'user',
                'link' => $request->link,
                'phone' => $request->phone,
                'status' => '0',
                'password' => Hash::make($request->password)
            ]);
            Toastr::success('Thank you!!!');
            Session::flash('type', 'warning');
            Session::flash('message', '
            Thank you for registration. You can\'t login right now because we will check your information first and if everything is correct then we will approved  you.');
            return redirect()->route('login');
        } catch (Exception $error) {
            session()->flash('type', 'error');
            session()->flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
