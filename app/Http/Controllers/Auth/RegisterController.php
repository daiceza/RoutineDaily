<?php

namespace RoutineDaily\Http\Controllers\Auth;

use RoutineDaily\User;
use RoutineDaily\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

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
    //従業員確認画面へ
    protected $redirectTo = '/worker/employee';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
        //ログインしたユーザーの設定オプションを取得
        if(User::all()->isEmpty()){
            //初めての登録はログイン不要
            $this->middleware('guest');
        }elseif(Auth::user()->role=='admin'){
            //管理者のみ新規登録可能
            $this->middleware('auth');
        }else{
            abort(404);
        }
        return $next($request);
        });
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'employee'=>['required','numeric','digits:4','unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'role'=>['required','string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \RoutineDaily\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'employee' => $data['employee'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
            'team' => $data['team'],
            'join' => $data['join'],
        ]);
    }
}
