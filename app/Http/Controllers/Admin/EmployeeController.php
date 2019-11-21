<?php

namespace RoutineDaily\Http\Controllers\Admin;

use Illuminate\Http\Request;
use RoutineDaily\Http\Controllers\Controller;

use RoutineDaily\Users;
use Carbon\carbon;
class EmployeeController extends Controller
{
    //
    public function employee(Request $request)
    {
        $my_team =$request->my_team;
        //所属検索
        if($my_team != ''){
            $posts = Users::where('team',$my_team)->orderBy('employee','asc')->get();
        }else{
            //従業員番号でソート
            $posts = Users::orderBy('employee','asc')->get();
        }
        return view('admin.employee',['posts'=>$posts]);
    }
    public function add(Request $request)
    {
        return view('admin.employee.create');
    }
    public function edit(Request $request)
    {
        $user = Users::find($request->id);
        if(empty($user)){
            abort(404);
        }
        return view('admin.employee.edit',['user_form'=>$user]);
    }
    public function update(Request $request)
    {
        $this->validate($request, Users::$rules);
        $user = Users::find($request->id);
        $user_form =$request->all();
        
        unset($user_form['_token']);
        $user->fill($user_form)->save();
        return redirect('admin/employee/');
    }
}
