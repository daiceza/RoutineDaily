<?php

namespace RoutineDaily\Http\Controllers\Worker;

use Illuminate\Http\Request;
use RoutineDaily\Http\Controllers\Controller;

use RoutineDaily\Routine;
use Auth;
class RoutineController extends Controller
{
    //
    public function routine(Request $request)
    {
        $posts =Routine::where('users_id',Auth::id())->get();
        return view('worker.routine',['posts'=>$posts]);
    }
    
    public function add()
    {
        $posts =Routine::all();
        return view('worker.routine.create');
    }
    public function create(Request $request)
    {
        $this->validate($request, Routine::$rules);
        $routine = new Routine;
        $form = $request->all();
        
        unset($form['_token']);
        $routine->fill($form)->save();
        
        return redirect('worker/routine/');
    }
    public function edit(Request $request)
    {
        $routine = Routine::find($request->id);
        if(empty($routine)){
            abort(404);
        }
        return view('worker.routine.edit',['routine_form'=>$routine]);
    }
    public function update(Request $request)
    {
        $this->validate($request,Routine::$rules);
        $routine = Routine::find($request->id);
        $routine_form =$request->all();
        unset($routine_form['_token']);
        $routine->fill($routine_form)->save();
        return redirect('worker/routine/');
    }
    public function delete(Request $request)
    {
        $routine = Routine::find($request->id);
        $routine->delete();
        return redirect('worker/routine/');
    }
}
