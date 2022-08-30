<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //user list page
    public function user()
    {
        $user = User::where('role', '!=', 'admin')->orderBy('id', 'desc')->get();
        return view('admin.user.user', compact('user'));
    }

    // user edit modal
    public function edit(Request $request, $id)
    {
        // return $request;
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'phone' => 'required',
                'link' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'status' => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
            }
            User::findorfail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'link' => $request->link,
                'phone' => $request->phone,
                'status' => $request->status,
            ]);
            Toastr::success('User update successfull');
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type', 'error');
            session()->flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // user details
    public function detail($id)
    {
        $user = User::findorfail($id);
        return view('admin.user.detail', compact('user'));
    }

    // user status updte
    public function status(Request $request, $id)
    {
        try {
            User::findorfail($id)->update(['status' => $request->status]);
            Toastr::success('User status update successfull');
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type', 'error');
            session()->flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // user delete
    public function delete($id)
    {
        try {
            User::findorfail($id)->delete();
            Toastr::success('User delete successfull');
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type', 'error');
            session()->flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
