<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:admin')->except('logout');

	}
    public function showlogin(){
    	return view('admin.auth.adminlogin');
    }

    public function login(Request $request){
    	dd($request->all());
    	$credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended(route('dashboard'));
        }
        else{
        	return redirect()->route('customer.showlogin');
        }
    }
}
