<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use App\Models\Admin;
use Hash;
use Session;
use Auth;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('dashboard.login.login');
    }

    public function login(Request $request){

        if (Auth::guard('admin')->attempt($request->only(['username','password']), $request->get('remember'))){

            return redirect()->intended('/sz-admin/home');
        }

        return redirect()->back()->with('error','Please check your email and password')->withInput($request->only(['username','remember']));
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

}

?>