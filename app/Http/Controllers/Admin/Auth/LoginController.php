<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout']])->except('logout'); // Logout function is omitted because
    }

    public function LoginForm(){
        return view('admin.auth.login');
    }

    public function login(Request $request){
        // Validate form data ...
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8|max:60',
        ]);

        // Attempt to login the user ...
        if(Auth::guard('web')->attempt(['email'=>$request->email, 'password' => $request->password], $request->remember)){
            dd();
            // On success ... Check Account status ...
            /*if(Auth::check()->user()->roles->pluck('name')->first() != 'admin'){ // user tried to login to the admin panel ....
                Auth::check()->logout();
                return back()->with('Error', 'Wrong Email or Password.')->withInput();
            }
            else{ // Admin is trying to login ....
                if(Auth::check()->user()->verified_at == null){ // Check email is validated ...
                    Auth::guard('admin')->logout();
                    return back()->with('Error', 'Please verify your email address first.');
                }
            }*/
            return redirect()->intended(route('admin'))->with('Success', 'Login successful.'); // Admin is successfully logged in ...
        }
        // Not success ... return back with data ... // invalid password or not admin user ...
        return redirect()->back()->with('Error', 'Wrong Email or Password.')->exceptInput('password'); // Incorrect email or password ...

        //return redirect()->back()->withInput($request->Input::only('email', 'remember'));
    }

    public function logout(){
        Auth::guard('admin')->logout();
        session()->flush();
        return redirect('/');
    }
}
