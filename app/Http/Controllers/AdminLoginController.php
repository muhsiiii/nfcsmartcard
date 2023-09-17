<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function Login()
    {
        return view('admin.login');
    }

    public function DoLogin(Request $request)
    {
        $input=$request->only(['username','password']);
        if(auth()->guard('admin')->attempt($input, true)){
            return redirect()->route('adminhome');
        }else{
            return redirect()->route('login');
        }
    }

    public function LoggedOut()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('login');
    }

    public function ChangePassword()
    {
        return view('admin.layouts.change_password.change_password');
    }

    public function ChangePasswordSave(Request $request)
    {
        $Oldpassword = $request->oldpwd;
        $Currentpassword=auth()->guard('admin')->user()->password;
        $adminID=auth()->guard('admin')->user()->id;

        if (Hash::check($Oldpassword, $Currentpassword)) {
          Admin::where('id',$adminID)->update([
            'password'=>bcrypt($request->newpwd),
          ]);
          $data['success']='success';
        } else {
           $data['error']='error';
        }
        echo json_encode($data);

    }
}
