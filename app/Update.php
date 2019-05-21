<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'update_of_fullday', 'user_id',
    ];
}
