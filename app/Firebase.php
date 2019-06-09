<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firebase extends Model
{
    protected $fillable = [
        'user_id', 'token','device','code'
    ];
}
