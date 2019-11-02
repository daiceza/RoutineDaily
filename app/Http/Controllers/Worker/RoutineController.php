<?php

namespace App\Http\Controllers\Worker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoutineController extends Controller
{
    //
    public function routine(Request $request)
    {
        return view('worker.routine');
    }
}
