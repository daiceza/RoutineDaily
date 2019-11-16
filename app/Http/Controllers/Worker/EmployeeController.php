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
        $posts =User::all();
        $routineposts=Routine::all();
        //$routineposts=Routine::where('users_id',$request->id)->get();
        return view('worker.employee',['posts'=>$posts,'routineposts'=>$routineposts]);
    }
    public function daily(Request $request)
    {
        $username =User::find($request->id);
        //$posts =Daily::where('users_id',$request->id)->get();
        $posts =Daily::where('users_id',$request->id)->paginate(5);
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
