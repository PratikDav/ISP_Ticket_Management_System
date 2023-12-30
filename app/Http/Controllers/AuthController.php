<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
      public function login()
    {
        return view('admin.pages.auth.login');
    }

    public function userLogin(Request $req)
    {
        $email = $req->email;
        $password = md5($req->password);
        $user = User::where('email', '=', $email)
            ->where('password', '=', $password)
            ->first();


        if ($user) {
            //check if user is approved(check value of status column is 1)
            if ($user->status == 1) {
                // save user info
                Session::put('user_id', $user->id);
                Session::put('user_name', $user->name);
                Session::put('user_email', $user->email);
                Session::put('user_role', $user->role);
                Session::put('user_picture', $user->picture);
                // Session::put('user_co_role', $user->co_role);
                // if ($dept_name) {
                //     Session::put('user_dept_name', $dept_name);
                // }
                return redirect('/home');
            } else {
                return redirect()->back()->with('error', 'User Not Approved Yet');
            }
        } else {
            return redirect()->back()->with('error', 'User Not Found With These Credentials');
        }
    }

    public function registerForm()
    {
        return view('admin.pages.auth.register');
    }
    public function userRegistration(Request $req)
    {

        if ($req->password == $req->confirm_password) {
            $user_exists = User::where('email', '=', $req->email)->first();
            if ($user_exists) {
                return redirect()->back()->with('error', 'Email Already exists');
            } else {
                $user = new User();

                $user->first_name = ucwords($req->first_name);
                $user->last_name = ucwords($req->last_name);
                $user->email = $req->email;
                $user->password = md5($req->password);
                $user->role = $req->role;
                //    $user-> status=
                if ($user->save()) {

                    return redirect()->back()->with('success', 'User Registered. Waiting for Admin Approval');
                }
            }
        } else {
            return redirect()->back()->with('error', 'Password Not Matched to Confirm Password');
        }
    }

    public function logout(Request $req)
    {
        $req->session()->forget(['user_id','user_name', 'user_email', 'user_role']);
        return redirect('/');
    }
}
