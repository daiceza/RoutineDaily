<?php

namespace RoutineDaily\Http\Controllers\Auth;

use RoutineDaily\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use RoutineDaily\User;

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
    //ログイン後、日報画面へ
    //protected $redirectTo ='/worker/daily';
    protected function redirectTo(){
        session()->flash('message','ログインしました');
        return '/worker/daily';
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
    /*public function username()
    {
        return 'employee';
    }*/
}
