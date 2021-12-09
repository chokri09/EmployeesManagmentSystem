<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'firstName',
        'lastName',
        'DOB',
        'salary',
        'ContratType',
        'profile_image'
    ];
}
