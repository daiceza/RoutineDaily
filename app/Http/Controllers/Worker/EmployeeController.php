<?php

namespace App\Http\Controllers\Worker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Daily;
use App\Routine;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    //
    public function employee(Request $request)
    {
        $my_team =$request->my_team;
        if($my_team != ''){
            $posts = User::where('team',$my_team)->orderBy('employee','asc')->get();
        }else{
            $posts = User::orderBy('employee','asc')->get();
        }
        
        //$routineposts=Routine::where('users_id',$request->id)->get();
        $routineposts=Routine::all();
        return view('worker.employee',['posts'=>$posts,'routineposts'=>$routineposts]);
    }
    public function daily(Request $request)
    {
        $username =User::find($request->id);
        $posts =Daily::where('users_id',$request->id)->orderBy('day', 'desc')->paginate(5);
        return view('worker.employee.daily',['posts'=>$posts,'username'=>$username]);
    }
    public function routine(Request $request)
    {
        $username =User::find($request->id);
        $posts =Routine::where('users_id',$request->id)->get();
        return view('worker.employee.routine',['posts'=>$posts,'username'=>$username]);
    }
    public function details(Request $request)
    {
        $routine = Routine::find($request->id);
        if(empty($routine)){
            abort(404);
        }
        return view('worker.employee.routine.details',['routine_form'=>$routine]);
    }
}
