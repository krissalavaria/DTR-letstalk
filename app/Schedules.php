<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_hours',
        'no_classes',
        'class_date',
    ];

    protected $table = 'employee_rate';

    public function users() {
        return $this->belongsTo('App\CustomUser', 'user_account_id');
    }

    public function salary_cycles() {
        return $this->belongsTo('App\SalaryCycle', 'salary_cycle_id');
    }
}
