<?php

namespace App\Http\Controllers\Worker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Daily;
use App\Routine;

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
        //$posts =Daily::all();
        $posts =Daily::where('users_id',$request->id)->get();
        return view('worker.employee.daily',['posts'=>$posts]);
    }
    public function routine(Request $request)
    {
        //$posts =Routine::all();
        $posts =Routine::where('users_id',$request->id)->get();
        return view('worker.employee.routine',['posts'=>$posts]);
    }
}
