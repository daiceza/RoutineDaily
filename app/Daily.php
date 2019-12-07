<?php

namespace RoutineDaily;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Daily extends Model
{
    //
    protected $guarded = array('id');
    protected $table = 'daily';
    public static $rules =array(
        'users_id'=>'required',
        'day' => 'required',
        'jobstart' => 'required',
        'jobend' => 'required',
        'timetable' => 'required',
    );
    public static $template=
    "9:00~10:00 掃除 15分 仕事A 3セット
10:00~11:00 仕事A 4セット
11:00~12:00 仕事A 4セット
12:00~13:00 休憩
13:00~14:00 仕事B 3セット
14:00~15:00 仕事B 3セット
15:00~16:00 仕事B 3セット
16:00~17:00 仕事C 3セット
17:00~18:00 仕事C 2セット 整理整頓 20分";
}
