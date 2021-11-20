<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo(){
        if (Auth::user()->role=='Super') {
            return route('admin.dashboard');
        }
        else if(Auth::user()->role=='Doctor') {
            return route('doctor.dashboard');
        }
        else if(Auth::user()->role=='Hospital') {
            return route('hospital.dashboard');
        }
        else if(Auth::user()->role=='Patient') {
            return route('patient.home');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'phone'=>'bail|size:10|string|required',
            'password'=>'required',
        ]);  
        
        if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
            if (Auth::user()->role=='Super') {
                return redirect()->route('admin.dashboard');
            }
            else if(Auth::user()->role=='Doctor') {
                return redirect()->route('doctor.dashboard');
            }
            else if(Auth::user()->role=='Hospital') {
                return redirect()->route('hospital.dashboard');
            }
            else if(Auth::user()->role=='Patient') {
                return redirect()->route('patient.home');
            }
        } else{
            return redirect()->route('login')->with('error','Invalid Phone Number Or/And Password');
        }
    }
}
