<?php

namespace RoutineDaily\Http\Controllers\Worker;

use Illuminate\Http\Request;
use RoutineDaily\Http\Controllers\Controller;

use RoutineDaily\Routine;
use RoutineDaily\Daily;
use RoutineDaily\User;
use Auth;

class DailyController extends Controller
{
    //
    public function daily(Request $request)
    {
        //日報確認
        $posts =Daily::where('users_id',Auth::id())
        ->orderBy('day', 'desc')->paginate(5);
        //今日より前の日報を取得
        $latest=Daily::where('users_id',Auth::id())
        ->where('day', '<', date('Y-m-d'))->first();
        return view('worker.daily',['posts'=>$posts,'latest'=>$latest]);
    }
    public function add(Request $request)
    {
        //日報作成画面へ
        $routineposts =Routine::where('users_id',Auth::id())
        ->orderByRaw(Routine::$importantsort)->get();
        //今日より前の日報を取得
        $latest=Daily::where('users_id',Auth::id())
        ->where('day', '<', date('Y-m-d'))->first();
        $template=Daily::$template;
        return view('worker.daily.create',['routineposts'=>$routineposts,'latest'=>$latest,
        'template'=>$template]);
    }
    public function create(Request $request)
    {
        //日報作成
        $this->validate($request, Daily::$rules);
        //日付重複確認
        $dailyrep = Daily::where('users_id',Auth::id())->where('day',$request->day)->first();
        if(!empty($dailyrep)){
            $daily = Daily::find($dailyrep->id);
            $message ='の日報を上書きしました';
        }else{
            $daily = new Daily;
            $message ='の日報を作成しました';
        }
        $user =  Auth::user();
        $dailyform  =$request->except('nextday','next');
        $userform   =$request->only('nextday','next');
        unset($dailyform['_token']);
        unset($userform['_token']);
        $user->fill($userform)->save();
        $daily->fill($dailyform)->save();
        return redirect('worker/daily/')->with('message', $request->day.$message);
    }
    
    public function edit(Request $request)
    {
        //日報編集
        $daily = Daily::find($request->id);
        if(empty($daily)){
            abort(404);
        }
        $routineposts =Routine::where('users_id',Auth::id())
        ->orderByRaw(Routine::$importantsort)->get();
        //今日より前の日報を取得
        $latest=Daily::where('users_id',Auth::id())
        ->where('day', '<', date('Y-m-d'))->first();
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
        return redirect('worker/daily/')->with('message', $request->day.'の日報を編集しました');
    }
    public function delete(Request $request)
    {
        //削除
        $daily = Daily::find($request->id);
        $deleteday = Daily::find($request->day);
        $daily->delete();
        return redirect('worker/daily')->with('message', $deleteday.'日報を削除しました');
    }
    public function next(Request $request)
    {
        //予定編集
        $this->validate($request, User::$nextrules);
        $user = User::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();
        return redirect('worker/daily')->with('message', $request->nextday.'の予定を編集しました');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
