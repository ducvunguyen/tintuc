<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class UserLoginController extends Controller
{
    public function __construct(){
    	$this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
    	// dd($request->all());
    	$email = $request->email;
    	$password = $request->password;

    	// lay thng tin user

    	// lay role cua user

    	// lay role cua nguoi dung binh thuong

    	// dieu kien: role user != role nguoi bt

    	// Role=user
    	//dk Auth::attempt(['email' => $email, 'password' => $password, !!=
    	if (Auth::attempt(['email' => $email, 'password' => $password])) {
    // The user is active, not suspended, and exists.


    		return redirect()->route('admin.dashboard');
		}
		else{
			return redirect()->back();
		}
    }

    public function logout(){
    	Auth::logout();
    	return redirect()->route('login.form_login');
    }
}
