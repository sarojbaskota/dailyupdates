<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scrum extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','done', 'todo','roadblock',
    ];
    // public function setDoneAttribute($value){

    //     $this->attributes['content'] = ucwords($value);
    // }
}
