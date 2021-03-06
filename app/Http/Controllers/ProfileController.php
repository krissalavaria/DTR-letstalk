<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use File;
use App\UserAccountType;
use App\Departments;
use App\Designation;
use App\Province;
use App\Barangay;
use App\CityMunicipality;
use App\CustomUser;
use App\SalaryType;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\TimeSheet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    public function index()
    {

        $provinces = Province::all();
        $cities = CityMunicipality::all();
        $barangays = Barangay::all();
        $departments = Departments::all();
        $designations = Designation::all();
        $salary_types = SalaryType::all();
        $user_account_types = UserAccountType::all();
        return view(
            'employee.employee-profile-settings',
            compact('provinces', 'cities', 'barangays', 'departments', 'salary_types', 'user_account_types')
        );
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $provinces = Province::all();
        $cities = CityMunicipality::all();
        $barangays = Barangay::all();
        $departments = Departments::all();
        $designations = Designation::all();
        $salary_types = SalaryType::all();
        $user_account_types = UserAccountType::all();

        return view('profile.edit', compact('provinces', 'cities', 'barangays', 'departments', 'salary_types', 'user_account_types'));
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // auth()->user()->update($request->all());
        CustomUser::where('id', auth()->user()->id)->update(
            array(
                'first_name' => $request['first_name'],
                'middle_name' => $request['middle_name'],
                'last_name' => $request['last_name'],
                'gender' => $request['gender'],
                'birthday' => $request['birthday'],
                'contact_number' => $request['contact_number'],
                'contact_person' => $request['contact_person'],
                'security_pin' => $request['security_pin'],
                'blk_door' => $request['blk_door'],
                'street' => $request['street'],
                'barangay_id' => $request['barangay_id'],
                'city_municipality_id' => $request['city_municipality_id'],
                'province_id' => $request['province_id'],
                'department_id' => $request['department_id'],
                'user_acct_type_id' => $request['user_acct_type_id'],
            )
        );

        return back()->withStatus(__('Information successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Password successfully updated.'));
    }

    public function get_user()
    {
        return Auth::user();
    }

    public function employee_time()
    {
        $user_id = \Request('q');
        $users_time = DB::table('user_account')
            ->where('user_account.id', 'LIKE', "%{$user_id}%")
            ->join('time_sheet', 'user_account.id', '=', 'time_sheet.user_account_id')
            ->select('user_account.*', 'time_sheet.temperature', 'time_sheet.created_at')
            ->get();
        return $users_time;
    }
}
