<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'auth_token',
        'locker',
        'employee_no',
        'username',
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'birthday',
        'contact_number',
        'contact_person',
        'security_pin',
        'blk_door',
        'street',
        'barangay_id',
        'city_municipality_id',
        'province_id',
        'department_id',
        'designation_id',
        'company_profile_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'user_accounts';
}
