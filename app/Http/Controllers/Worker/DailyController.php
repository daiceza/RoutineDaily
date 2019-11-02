<?php

namespace App\Http\Controllers\Worker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DailyController extends Controller
{
    //
    public function daily(Request $request)
    {
        return view('worker.daily');
    }
}
