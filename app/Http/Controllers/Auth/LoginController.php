<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Backend\Doctor;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
//    protected $redirectTo = RouteServiceProvider::HOME;

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
        return $this->authenticate($request);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credentials)) {
            if (Auth::check()) {
                $user = Auth::user()->load('role');
                if ($user->role->id === 1) {
                    return redirect(route('admin.view.profile'));
                } elseif ($user->role->id === 2 && $user->approved_status == 1) {
                    return redirect(route('doctor.view.profile'));
                } elseif ($user->role->id == 3) {
                    return redirect(route('patient.home.view'));
                } else {
                    Auth::logout();
                    return back()->withInput()->withErrors([
                        'email' => 'You are not authorized to view this page',
                    ]);
                }
            }


        }
        return back()->withInput()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ]);

    }
}
