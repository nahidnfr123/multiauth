<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\PhoneMaxLength;
use App\Rules\PhoneMinLength;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Throwable;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    //protected $redirectTo = RouteServiceProvider::LOGIN;


    // Prevent user from default login after register is complete ...
    protected function registered(Request $request, $user)
    {
        if (Auth::check()){
            Auth::logout();
            session()->flash('Success', 'Registration is successful. Please login to your account.');
            return redirect()->route('login');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mobile_number' => ['required', 'numeric', 'unique:users', 'regex:/(01)[0-9]{9}/', new PhoneMinLength , new PhoneMaxLength],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return bool
     */
    protected function create(array $data)
    {
        try {
            $User = User::create([
                'full_name' => ucwords($data['full_name']),
                'email' => $data['email'],
                'mobile_number' => $data['mobile_number'],
                'password' => Hash::make($data['password']),
                'verification_token' => str_shuffle(Str::random(32)),
            ]);
            $User->roles()->attach(Role::where('name', 'customer')->first());

        } catch (Throwable $e){
            report($e);
            return false;
        }
        return $User;

        // The following code doesnot work here in laravel 7 \\
        //Auth::logout();
        //session()->flash('Success', 'Your account was registered. Please login to your account.');
        //return redirect('/login');
    }
}
