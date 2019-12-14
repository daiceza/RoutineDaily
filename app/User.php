<?php

namespace RoutineDaily;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'employee', 'email', 'password','role','team','join',
        'nextday','next',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $guarded = array('id');
    protected $table = 'users';
    public static $rules =array(
        'name' => ['required', 'string', 'max:100'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'employee'=>['required','numeric','digits:4'],
        'team' => 'required',
        'join' => 'required',
        'password' => 'required',
        );
    public static $nextrules =array(
        'next' => ['string', 'max:255'],
        );
    public static $profileeditrules =array(
        'name' => ['required', 'string', 'max:100'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'employee'=>['required','numeric','digits:4'],
        //'password' => ['required', 'string', 'min:4', 'confirmed'],
        'team' => 'required',
        'join' => 'required',
        );
    public function daily()
    {
        return $this->hasmany('RoutineDaily\Daily','users_id');
    }
    public function routine()
    {
        return $this->hasmany('RoutineDaily\Routine','users_id');
    }
}
