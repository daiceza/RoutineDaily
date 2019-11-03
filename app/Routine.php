<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    protected $guarded =array('id');
    protected $table = 'routine';
    public static $rules = array(
        'jobname' => 'required',
        'body' => 'required',
    );
}
