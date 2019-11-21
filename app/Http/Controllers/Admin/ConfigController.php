<?php

namespace RoutineDaily\Http\Controllers\Admin;

use Illuminate\Http\Request;
use RoutineDaily\Http\Controllers\Controller;

class ConfigController extends Controller
{
    //
    public function config(Request $request)
    {
        return view('admin.config');
    }
    public function update(Request $request)
    {
        return redirect('admin/config');
    }
}
