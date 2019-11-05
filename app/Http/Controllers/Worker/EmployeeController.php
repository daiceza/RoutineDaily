<?php

namespace App\Http\Controllers\Worker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class EmployeeController extends Controller
{
    //
    public function employee(Request $request)
    {
        $posts =User::all();
        return view('worker.employee',['posts'=>$posts]);
    }
}
