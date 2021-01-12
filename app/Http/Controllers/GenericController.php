<?php

namespace App\Http\Controllers;

use App\Departments;
use App\Designation;
use App\Province;
use App\Barangay;
use App\CityMunicipality;
use App\CustomUser;
use App\SalaryCycle;
use App\SalaryType;
use Illuminate\Http\Request;
use Auth;


class GenericController extends Controller
{
    public function getDropDownData()
    {
        $provinces = Province::all();
        $cities = CityMunicipality::all();
        $barangays = Barangay::all();
        $departments = Departments::all();
        $designations = Designation::all();
        $salary_types = SalaryType::all();
        return view(
            'auth.add-new-user',
            compact('provinces', 'cities', 'barangays', 'departments', 'designations', 'salary_types')
        );
    }

    public function postLogin(Request $request)
    {

        $locker = CustomUser::select('locker')->where('username', $request->username)->first();

        $username = $request['username'];
        $password = sha1($this->password_generator($request['password'], $locker->locker));

        $is_logged_in = CustomUser::where([['username', $username], ['password', $password]])->first();

        var_dump($locker.'-'.$password);
    }

    protected function password_generator($password, $locker, $length = 100)
    {
        $result = "";
        // $chars = $password;
        // $charArray = str_split($chars);

        for ($i = 0; $i < $length; $i++) {
            // $randItem = array_rand($charArray);
            $result .= "" . strrev($password) . $locker;
        }

        return $result;
    }
}
