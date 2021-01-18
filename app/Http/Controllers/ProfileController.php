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
use App\SalaryType;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\TimeSheet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
            compact('provinces', 'cities', 'barangays', 'departments', 'designations', 'salary_types', 'user_account_types')
        );
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
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
