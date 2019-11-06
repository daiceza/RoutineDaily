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
        return view('admin.employee.edit');
    }
    public function update(Request $request)
    {
        return view('admin/employee');
    }
}
