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
    //重要度のソート
    public static $importantsort ="case
        when important = '毎日' then 1
        when important = '週2~3回' then 2
        when important = '週1回' then 3
        when important = '月1回' then 4
        else 9999 end";
    public function users()
    {
        return $this->belongsTo('RoutineDaily\Users','foreign_key');
    }
}
