<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskComment extends Model
{
    protected $table = 'task_comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','task_id' ,'content',
    ];
    public function setContentAttribute($value){

        $this->attributes['content'] = ucwords($value);
    }
}
