<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CustomUser extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

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

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'user_account';
    protected $dates = ['deleted_at'];
    
}
