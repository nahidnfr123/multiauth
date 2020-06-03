<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    //protected $redirectTo = RouteServiceProvider::HOME;

    protected function authenticated(Request $request, $user)
    {
        // Check if admin is trying to login through the customer from ...
        if(Auth::check()) {
            $authRole = Auth::user()->roles->pluck('name')->first();
            if($authRole == 'admin' || $authRole == 'super_admin'){
                return redirect()->intended(route('admin.index'));

            }else{
                Auth::logout();
                session()->flash('Error', 'Invalid login credentials.');
                return redirect()->route('admin.login');
            }


        }
        //dd('nahid');

    }



    public function showLoginForm(){
        return view('admin.auth.login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest', ['except' => ['logout']])->except('logout');
        $this->middleware('guest')->except('logout');
    }
}
