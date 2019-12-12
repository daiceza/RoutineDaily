<?php

namespace RoutineDaily\Http\Controllers\Worker;

use Illuminate\Http\Request;
use RoutineDaily\Http\Controllers\Controller;

use RoutineDaily\Routine;
use RoutineDaily\Users;
use Auth;
class RoutineController extends Controller
{
    //仕事リスト表示
    public function routine(Request $request)
    {
        //自分の仕事
        $myposts =Routine::where('users_id',Auth::id())
        ->orderByRaw(Routine::$importantsort)->get();
        //他従業員の仕事
        $otherposts =Routine::where('users_id',"!=",Auth::id())
        ->orderByRaw(Routine::$importantsort)->get();
        //->join('routine','users_id','=','users.id')->get();
        //->join('users','users.id','=','routine.users_id')->get();
        return view('worker.routine',
        ['myposts'=>$myposts,'otherposts'=>$otherposts]);
    }
    public function add(Request $request)
    {
        //新規作成・コピー
        $routine = Routine::find($request->id);
        return view('worker.routine.create',['routine_form'=>$routine]);
    }
    public function create(Request $request)
    {
        $this->validate($request, Routine::$rules);
        $routine = new Routine;
        $form = $request->all();
        
        unset($form['_token']);
        $routine->fill($form)->save();
        
        return redirect('worker/routine/')->with('message', $request->jobname.'を作成しました');
    }
    public function edit(Request $request)
    {
        //編集
        $routine = Routine::find($request->id);
        if(empty($routine)){
            abort(404);
        }
        return view('worker.routine.edit',['routine_form'=>$routine]);
    }
    public function update(Request $request)
    {
        //更新
        $this->validate($request,Routine::$rules);
        $routine = Routine::find($request->id);
        $routine_form =$request->all();
        unset($routine_form['_token']);
        $routine->fill($routine_form)->save();
        return redirect('worker/routine/')->with('message', $request->jobname.'を編集しました');
    }
    public function delete(Request $request)
    {
        //削除
        $routine = Routine::find($request->id);
        $routine->delete();
        return redirect('worker/routine/')->with('message', '削除しました');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
