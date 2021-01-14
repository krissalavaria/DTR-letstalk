<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];

    protected $table = 'department';
}
