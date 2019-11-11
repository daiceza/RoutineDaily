<?php

namespace App;

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
        'name', 'employee', 'email', 'password',
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
    //protected $dates = ['join'];
    //モデル?
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
    
}
