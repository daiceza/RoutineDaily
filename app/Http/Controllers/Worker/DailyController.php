<?php

namespace RoutineDaily\Http\Controllers\Worker;

use Illuminate\Http\Request;
use RoutineDaily\Http\Controllers\Controller;

use RoutineDaily\Routine;
use RoutineDaily\Daily;
use RoutineDaily\Users;
use Auth;

class DailyController extends Controller
{
    //
    public function daily(Request $request)
    {
        //日報確認
        $posts =Daily::where('users_id',Auth::id())
        ->orderBy('day', 'desc')->paginate(5);
        return view('worker.daily',['posts'=>$posts]);
    }
    public function add(Request $request)
    {
        //日報作成画面へ
        $routineposts =Routine::where('users_id',Auth::id())->get();
        $dailyposts=Daily::where('users_id',Auth::id())
        ->orderBy('day', 'desc')->get();
        
        if(count($dailyposts)>0){
            //最新のタイムテーブルを右側に表示
            $latest =$dailyposts->shift();
        }else{
            $latest = null;
        }
        return view('worker.daily.create',['routineposts'=>$routineposts,'latest'=>$latest]);
    }
    public function create(Request $request)
    {
        //日報作成
        $this->validate($request, Daily::$rules);
        $daily = new Daily;
        $user =  Auth::user();
        
        /*$form = $request->all();
        unset($form['_token']);
        $daily->fill($form)->save();*/
        
        $dailyform  =$request->except('nextday','next');
        $userform   =$request->only('nextday','next');
        unset($dailyform['_token']);
        unset($userform['_token']);
        
        $user->fill($userform)->save();
        $daily->fill($dailyform)->save();
        
        return redirect('worker/daily/');
    }
    public function edit(Request $request)
    {
        //日報編集
        $daily = Daily::find($request->id);
        if(empty($daily)){
            abort(404);
        }
        
        $routineposts =Routine::where('users_id',Auth::id())->get();
        
        $dailyposts=Daily::find($request->id)
        ->orderBy('day', 'desc')->get();
        //$dailyposts=Daily::all()->sortByDesc('day');
        
        if(count($dailyposts)>0){
            $latest =$dailyposts->shift();
        }else{
            $latest = null;
        }
        
        return view('worker.daily.edit',['daily_form'=>$daily,
        'latest'=>$latest,'routineposts'=>$routineposts]);
    }
    public function update(Request $request)
    {
        //日報更新
        $this->validate($request, Daily::$rules);
        $daily = Daily::find($request->id);
        $daily_form =$request->all();
        
        unset($daily_form['_token']);
        $daily->fill($daily_form)->save();
        return redirect('worker/daily/');
    }
    public function delete(Request $request)
    {
        //削除
        $daily = Daily::find($request->id);
        $daily->delete();
        return redirect('worker/daily');
    }
}
