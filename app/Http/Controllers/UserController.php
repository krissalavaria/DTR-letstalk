<?php

namespace App\Http\Controllers;

use Validator;
use QrCode;
use App\Barangay;
use App\CityMunicipality;
use DB, Auth;
use App\User;
use App\CustomUser;
use App\Departments;
use App\Designation;
use App\SalaryCycle;
use App\SalaryType;
use Exception;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Province;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public $locker;

    /**
     * Display a listing of the users
     *
     * @param User $model
     * @return View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function generate_qr($id)
    {
        $user = CustomUser::find($id);
        $qr_code = QrCode::size(300)->generate($user->auth_token);
        
        return view('users.generate-id', compact('qr_code'));
    }

    public function store(Request $data)
    {
        Validator::extend('without_spaces', function ($attr, $value) {
            return preg_match('/^\S*$/u', $value);
        });

        request()->validate(
            [
                'username' => 'required|without_spaces|unique:user_account',
                'first_name' => 'required',
                'middle_name' => 'required',
                'last_name' => 'required',
                'contact_number' => 'required|max:11',
                'province_id' => 'required',
            ],
            ['username.without_spaces' => 'Whitespace not allowed on username.']
        );

        $insert_user = CustomUser::create([
            'auth_token' => $this->auth_token(),
            'picture' => $this->auth_token(),
            'locker' => $this->locker,
            'employee_no' => $this->employee_no(),
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'birthday' => $data['birthday'],
            'contact_number' => $data['contact_number'],
            'contact_person' => $data['contact_person'],
            'contact_person_number' => $data['contact_person_number'],
            'room_cubicle_number' => $data['room_cubicle_number'],
            'security_pin' => $data['security_pin'],
            'blk_door' => $data['blk_door'],
            'street' => $data['street'],
            'barangay_id' => $data['barangay_id'],
            'city_municipality_id' => $data['city_municipality_id'],
            'province_id' => $data['province_id'],
            'department_id' => $data['department_id'],
            'designation_id' => $data['designation_id'],
            'user_acct_type_id' => $data['user_acct_type_id'],
            'company_profile_id' => $data['company_profile_id'],
            'salary_type_id' => $data['salary_type_id'],
        ]);

        if ($insert_user) {
            $salary_cycle = SalaryCycle::create([
                'user_account_id' => $insert_user->id,
                'salary_type_id' => $data->salary_type_id,
                'is_cleared' => 0,
                'cycle_date' => now(),
                'created_at' => now(),
            ]);

            return redirect()->route('add-new-users')
                ->withStatus(__('Account successfully created.'));
        }
    }

    public function edit($id)
    {
        $user = CustomUser::find($id);
        $designations = Designation::all();
        $departments = Departments::all();
        $provinces = Province::all();
        $cities = CityMunicipality::all();
        return view('users.edit-users', compact('user', 'designations', 'departments', 'provinces', 'provinces', 'cities'));
    }

    public function update(Request $request, CustomUser $user)
    {
        $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'contact_number' => 'required',
            'contact_person' => 'required',
            'blk_door' => 'required',
            'street' => 'required',
            'barangay_id' => 'required',
            'city_municipality_id' => 'required',
            'province_id' => 'required',
            'department_id' => 'required',
            'designation_id' => 'required',
        ]);

        $user->update($request->all());

        return redirect()->route('manage-users')
            ->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        $user = CustomUser::find($id);
        $user->delete();

        return redirect()->route('manage-users')->with('success', 'Post updated successfully');
    }

    public function list_user(CustomUser $model)
    {
        return view('pages.manage-users', ['user_lists' => $model->paginate(10)]);
    }

    /**
     * @param int $id
     * @param int $length
     * @return string
     * @throws Exception
     */
    public function auth_token($id = 1, $length = 5)
    {
        $bytes = random_bytes(ceil($length / 2));
        $random = substr(bin2hex($bytes), 0, $length);
        // $auth = (sha1($random . date('y-m-d:h:i:s') . $random . date('y-m-d:h:i:s')));
        $auth = (sha1($random . date('y-m-d:h:i:s')));

        return $auth;
    }

    public function generate_ID($id)
    {
        $users = CustomUser::find($id);

        return view('users.generate-id', compact('users'));
    }

    public function get_last_employee_no()
    {
        // $employee_no = DB::table('user_accounts')->orderBy('id', 'desc')->select('employee_no')->first();
        $employee_no = CustomUser::pluck('employee_no')->last();
        return $employee_no;
    }

    public function employee_no()
    {
        $formerReference = $this->get_last_employee_no();

        $parts = explode("-", $formerReference);
        $numbers = $parts[1];
        $letters = $parts[0];

        if ($numbers == "999999") {
            $nextLetters = ++$letters;
            $nextNumbers = 1;
        } else {
            $nextLetters = $letters;
            $nextNumbers = ++$numbers;
        }

        $nextReference = $nextLetters . "-" . sprintf('%06d', $nextNumbers);

        return $nextReference;
    }
}
