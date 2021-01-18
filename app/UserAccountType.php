<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAccountType extends Model
{
    protected $fillable = [
        'department_id',
        'account_name',
        'hourly_rate',
    ];

    protected $table = 'user_account_type';

    public function departments() 
    {
        return $this->belongsTo('App\Departments', 'department_id');
    }
}
