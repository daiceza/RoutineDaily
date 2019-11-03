<?php

namespace App\Http\Controllers\Worker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Routine;
use App\Daily;

class DailyController extends Controller
{
    //
    public function daily(Request $request)
    {
        return view('worker.daily');
    }
    public function add()
    {
        $posts =Routine::all();
        return view('worker.daily.create');
    }
    public function create()
    {
        return redirect('worker/daily/create');
    }
    public function edit()
    {
        return view('worker.daily.edit');
    }
    public function update()
    {
        return redirect('worker/daily/edit');
    }
}
