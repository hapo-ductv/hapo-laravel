<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/home';
    public function __construct()
    {
    	$this->middleware('admin')->except(['getLogin', 'postLogin']);
    }
    
    public function getLogin()
    {
        return view('admin.login');
    }
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        return view('master',['admin'=>$admin->id]);
    }
    public function postLogin(Request $request)
    {
    	$email = $request->email;
        $password = $request->password;
        $remember = $request->has('remember_token') ? true : false;

        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password], $remember)) {
        	
            return redirect()->route('admin.index');
        } 
        return redirect()->back()->withErrors(['false'=>'Username or Password is incorrect']);
    }
     public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.get_login');
    }
}
