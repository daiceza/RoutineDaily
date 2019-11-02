<?php

namespace App\Http\Controllers\Worker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    //
    public function list(Request $request)
    {
        return view('worker.list');
    }
}
