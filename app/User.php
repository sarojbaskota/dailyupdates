<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Task;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'email', 'position_in_office','phone', 'is_admin', 'password','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function setPasswordAttribute($value){
 
         $this->attributes['password'] = Hash::make($value);
    }
    public function setFullNameAttribute($value){

        $this->attributes['full_name'] = ucwords($value);
    }
    /**
     * Get the tasks for the user.
     */
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
    /**
     * Get the leave request for the user.
     */
    public function leave_request()
    {
        return $this->hasMany('App\Leave');
    }
}
