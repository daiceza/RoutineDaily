<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daily extends Model
{
    //
    protected $guarded = array('id');
    protected $table = 'daily';
    public static $rules =array(
        'day' => 'required',
        'jobstart' => 'required',
        'jobend' => 'required',
        'breakstart' => 'required',
        'breakend' => 'required',
        'body' => 'required',
        );
}
