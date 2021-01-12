<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryCycle extends Model
{
    protected $fillable = [
        'user_account_id',
        'salary_type_id',
        'is_cleared',
        'cycle_date',
    ];
}
