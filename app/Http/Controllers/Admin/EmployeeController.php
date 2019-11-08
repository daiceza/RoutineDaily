<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class EmployeeController extends Controller
{
    //
    public function employee(Request $request)
    {
        $posts =User::all();
        return view('admin.employee',['posts'=>$posts]);
    }
    public function add(Request $request)
    {
        return view('admin.employee.create');
    }
    public function edit(Request $request)
    {
        $user = User::find($request->id);
        if(empty($user)){
            abort(404);
        }
        return view('admin.employee.edit',['user_form'=>$user]);
    }
    public function update(Request $request)
    {
        $this->validate($request,User::$rules);
        $user =User::find($request->id);
        $user_form=$request->all();
        unset($user_form['_token']);
        $user->fill($user_form)->save();
        return redirect('admin/employee/');
    }
}
