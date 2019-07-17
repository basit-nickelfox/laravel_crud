<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable=[
     'name',
     'phone',
     'address',
     'email',
     'image',
     'department',
    ];
}
