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
        'contact_person_number',
        'room_cubicle_number',
        'security_pin',
        'blk_door',
        'street',
        'barangay_id',
        'city_municipality_id',
        'province_id',
        'department_id',
        'designation_id',
        'tl_id',
        'user_acct_type_id',
        'company_profile_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'user_account';
    protected $dates = ['deleted_at'];
    
    public function barangays() {
        return $this->belongsTo('App\Barangay', 'barangay_id');
    }

    public function cities() {
        return $this->belongsTo('App\CityMunicipality', 'city_municipality_id');
    }
    
    public function provinces() {
        return $this->belongsTo('App\Province', 'province_id');
    }

    public function departments() {
        return $this->belongsTo('App\Departments', 'department_id');
    }

    public function designations() {
        return $this->belongsTo('App\Designation', 'designation_id');
    }

    public function accounts() {
        return $this->belongsTo('App\UserAccountType', 'user_acct_type_id');
    }
}
