<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function login(Request $request) {
        if ($request->isMethod('POST')) {
            //đăng nhập thành công
            if (Auth::check(['email'=>$request->email,'password'=>$request->password])){
                return redirect()->route('trangchu');
            } else {
                Session::flash('error','Sai mật khẩu hoặc email');
                return redirect()->route('login');
            }
        }
        return view('include.trangchu.login');
    }
}
