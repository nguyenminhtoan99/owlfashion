<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\LoginRequest;
use App\Model\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;




class AdminController extends Controller
{


    public function getLogin(){
        return view('admin.auth.login');
    }

    public function postLogin(LoginRequest $request){
        $admin = Admin::query()
            ->where('email', $request->get('email'))
            ->first();

        if ($admin !== null) {
            if (Hash::check($request->get('password'), $admin->password)) {
               // $request->session()->put('login', $request->input('email'));
               $request->session()->put('login', true);
			    return redirect('/admin/category/');
            }
            return back()->with('notification', 'Sai email hoặc mật khẩu')->withInput();
        }
        return back()->with('notification', 'Sai email hoặc mật khẩu')->withInput();
    }

    public function logout()
    {
        Auth::logout();
        Session::forget('login');
        //$request->session()->forget('login');
        return redirect("login");
    }
}
