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
        if($my_team != '' and $my_team !='全員'){
            $posts = Users::where('team',$my_team)->orderBy('employee','asc')->get();
        }else{
            //従業員番号でソート
            $posts = Users::orderBy('employee','asc')->get();
        }
        $teamlist =Users::distinct()->select('team')->get();
        return view('admin.employee',['posts'=>$posts,'my_team'=>$my_team,
        'teamlist'=>$teamlist]);
    }
    public function edit(Request $request)
    {
        //編集
        $user = Users::find($request->id);
        if(empty($user)){
            abort(404);
        }
        return view('admin.employee.edit',['user_form'=>$user]);
    }
    public function update(Request $request)
    {
        //更新
        $this->validate($request, Users::$profileeditrules);
        $user = Users::find($request->id);
        $user_form =$request->all();
        
        unset($user_form['_token']);
        $user->fill($user_form)->save();
        return redirect('admin/employee/')->with('message', $request->name.'を更新しました');
    }
    public function delete(Request $request)
    {
        //削除
        $user = Users::find($request->id);
        $user->delete();
        return redirect('admin/employee/')->with('message', '削除しました');
    }
}
