<?php

namespace RoutineDaily;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $guarded = array('id');
    protected $table = 'users';
    public static $rules =array(
        'name' => 'required',
        'email' => 'required',
        //'email_verified_at' => 'required',
        'employee' => 'required|digits:4',
        'team' => 'required',
        'join' => 'required',
        'password' => 'required',
        );
    public static $profileeditrules =array(
        'name' => 'required',
        'email' => 'required',
        'employee' => 'required|digits:4',
        //'email_verified_at' => 'required',
        'team' => 'required',
        'join' => 'required',
        
        );
    public static $mailpass =array(
        'email' => 'required',
        'password' => 'required|string|min:4|confirmed',
        );
    public function daily()
    {
        return $this->hasmany('RoutineDaily\Daily');
    }
    public function routine()
    {
        return $this->hasmany('RoutineDaily\Routine');
    }
}
