<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'username',
        'email',
        'firstName',
        'middleInitial',
        'lastName'
    ];
    protected $hidden = [
      'password'
    ];


}
