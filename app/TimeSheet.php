<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSheet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_account_id',
        'temperature',
        'created_at',
    ];

    protected $table = 'time_sheet';

    public function users() {
        return $this->belongsTo('App\CustomUser', 'user_account_id');
    }
}
