<?php

namespace RoutineDaily;

use Illuminate\Database\Eloquent\Model;

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
}
