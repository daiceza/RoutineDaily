<?php

namespace RoutineDaily\Http\Controllers\Worker;

use Illuminate\Http\Request;
use RoutineDaily\Http\Controllers\Controller;

use RoutineDaily\User;
use RoutineDaily\Daily;
use RoutineDaily\Routine;
use Carbon\Carbon;
use Auth;
use Hash;

class EmployeeController extends Controller
{
    //
    public function employee(Request $request)
    {
        //従業員リスト
        $my_team =$request->my_team;
        if($my_team != '' and $my_team !='全員'){
            $posts = User::where('team',$my_team)->orderBy('employee','asc')->get();
        }else{
            //従業員番号でソート
            $posts = User::orderBy('employee','asc')->get();
        }
        $teamlist =User::distinct()->select('team')->get();
        $routineposts=Routine::all();
        return view('worker.employee',['posts'=>$posts,'routineposts'=>$routineposts,
        'teamlist'=>$teamlist,'my_team'=>$my_team]);
    }
    public function daily(Request $request)
    {
        //日報詳細
        $username =User::find($request->id);
        $posts =Daily::where('users_id',$request->id)->orderBy('day', 'desc')->paginate(5);
        $latest=Daily::where('users_id',$request->id)->orderBy('day', 'desc')->where('day', '<', date('Y-m-d'))->first();
        return view('worker.employee.daily',['posts'=>$posts,'username'=>$username,'latest'=>$latest]);
    }
    public function routine(Request $request)
    {
        //仕事詳細
        $username =User::find($request->id);
        $posts =Routine::where('users_id',$request->id)->orderByRaw(Routine::$importantsort)->get();
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
        $this->validate($request,User::$profileeditrules);
        $user = Auth::user();
        $user_form =$request->all();
        //$passcheck=Hash::check($user_form['current_password'], $user->password);
        $user_form['password'] =Hash::make($request->password);
        unset($user_form['_token']);
        $user->fill($user_form)->save();
        
        return redirect('worker/employee/')->with('message', $user->name.'を編集しました');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
