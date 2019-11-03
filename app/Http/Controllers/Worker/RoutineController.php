<?php

namespace App\Http\Controllers\Worker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Routine;

class RoutineController extends Controller
{
    //
    public function routine(Request $request)
    {
        $posts =Routine::all();
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
        
        return redirect('worker/routine/create');
    }
    public function edit(Request $request)
    {
        return view('worker.routine.edit');
    }
    public function update(Request $request)
    {
        return redirect('worker/routine/edit');
    }
    public function delete(Request $request)
    {
        return redirect('worker/routine/');
    }
}
