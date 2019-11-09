<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $guarded = array('id');
    protected $table = 'users';
    public static $rules =array(
        'name' => 'required',
        //'employee' => 'required',
        //'email' => 'required',
        //'email_verified_at' => 'required',
        //'password' => 'required',
        'team' => 'required',
        'join' => 'required',
        
        );
    public function daily()
    {
        return $this->hasmany('App\Daily');
    }
    public function routine()
    {
        return $this->hasmany('App\Routine');
    }
}