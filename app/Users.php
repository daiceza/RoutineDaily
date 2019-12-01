<?php

namespace RoutineDaily;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $guarded = array('id');
    protected $table = 'users';
    public static $rules =array(
        'name' => 'required',
        'email' => 'required',
        'employee' => 'required|digits:4',
        'team' => 'required',
        'join' => 'required',
        'password' => 'required',
        );
    public static $profileeditrules =array(
        'name' => 'required',
        'email' => 'required',
        'employee' => 'required|digits:4',
        'team' => 'required',
        'join' => 'required',
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
