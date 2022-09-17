<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Admin;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $guard = 'adminMiddle';
    protected $redirectTo = 'admin/home';

    public function __constructor()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guard()
    {
        return auth()->guard('adminMiddle');
    }

    public function loginform()
    {
        if (auth()->guard('adminMiddle')->user()) {
            return back();
        }
        return view('back.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'

        ]);

        if (auth()->guard('adminMiddle')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $admin = auth()->guard('adminMiddle')->user();
            return redirect(url('admin/home'))->with('message', "Berhasil Login");
        } else {
            return back()->with('error', 'Email atau paswword salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect(url('admin/login'))->with('message', "Berhasil Logout");
    }
}
