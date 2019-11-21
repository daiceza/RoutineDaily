<?php

namespace RoutineDaily;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    protected $guarded =array('id');
    protected $table = 'routine';
    public static $rules = array(
        'users_id'=> 'required',
        'jobname' => 'required',
        'settime' => 'required',
        'content' => 'required',
    );
    public function users()
    {
        return $this->belongsTo('RoutineDaily\Users','foreign_key');
    }
}
