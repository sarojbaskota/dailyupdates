<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','leave_request', 'leave_response','status',
    ];
     /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
