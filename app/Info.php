<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = ['name', 'email', 'description'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

}
