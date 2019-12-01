<?php

namespace RoutineDaily\Http\Controllers\Worker;

use Illuminate\Http\Request;
use RoutineDaily\Http\Controllers\Controller;

use RoutineDaily\User;
use RoutineDaily\Users;
use RoutineDaily\Daily;
use RoutineDaily\Routine;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    //
    public function employee(Request $request)
    {
        //従業員リスト
        $my_team =$request->my_team;
        if($my_team != ''){
            $posts = User::where('team',$my_team)->orderBy('employee','asc')->get();
        }else{
            $posts = User::orderBy('employee','asc')->get();
        }
        $routineposts=Routine::all();
        return view('worker.employee',['posts'=>$posts,'routineposts'=>$routineposts]);
    }
    public function daily(Request $request)
    {
        //日報詳細
        $username =User::find($request->id);
        $posts =Daily::where('users_id',$request->id)->orderBy('day', 'desc')->paginate(5);
        return view('worker.employee.daily',['posts'=>$posts,'username'=>$username]);
    }
    public function routine(Request $request)
    {
        //仕事詳細
        $username =User::find($request->id);
        $posts =Routine::where('users_id',$request->id)->get();
        return view('worker.employee.routine',['posts'=>$posts,'username'=>$username]);
    }
    public function details(Request $request)
    {
        //仕事詳細
        $routine = Routine::find($request->id);
        if(empty($routine)){
            abort(404);
        }
        return view('worker.employee.routine.details',['routine_form'=>$routine]);
    }
    public function edit(Request $request)
    {
        $user = User::find($request->id);
        if(empty($user)){
            abort(404);
        }
        return view('worker.employee.edit',['user_form'=>$user]);
    }
    public function update(Request $request)
    {
        $this->validate($request,Users::$mailpass);
        $user = Auth::user();
        $user_form =$request->except('password_confirmation');
        //$user_form->password = bcrypt($request->get('new-password'));
        unset($user_form['_token']);
        $user->fill($user_form)->save();
        
        return redirect('worker/employee/');
    }
}
